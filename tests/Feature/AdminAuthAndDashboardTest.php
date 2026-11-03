<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Inquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class AdminAuthAndDashboardTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name'     => 'Executive Director',
            'email'    => 'admin@trevanta.com',
            'password' => Hash::make('Password@123'),
        ]);
    }

    public function test_admin_login_page_loads_with_adminlte(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Admin Login');
        $response->assertSee('admin-lte', false);
    }

    public function test_guest_is_redirected_from_dashboard_to_login(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_with_valid_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email'    => 'admin@trevanta.com',
            'password' => 'Password@123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_admin_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->from('/admin/login')->post('/admin/login', [
            'email'    => 'admin@trevanta.com',
            'password' => 'WrongPassword',
        ]);

        $response->assertRedirect('/admin/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_admin_can_view_dashboard(): void
    {
        Inquiry::create([
            'type'              => 'rfp',
            'name'              => 'Dr. Alice Martin',
            'email'             => 'alice@sponsor.com',
            'phase'             => 'Phase II (Proof-of-Concept)',
            'therapeutic_focus' => 'Oncology',
            'message'           => 'Protocol proposal for solid tumors',
            'status'            => 'new',
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dashboard');
        $response->assertSee('Dr. Alice Martin');
        $response->assertSee('AdminLTE', false);
    }

    public function test_authenticated_admin_can_view_inquiries_on_dashboard(): void
    {
        Inquiry::create([
            'type'              => 'contact',
            'name'              => 'Dr. Bob Henderson',
            'email'             => 'bob@partner.org',
            'organization'      => 'Henderson Bio',
            'message'           => 'General partnership inquiry',
            'status'            => 'contacted',
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dr. Bob Henderson');
        $response->assertSee('Henderson Bio');
    }

    public function test_admin_can_update_inquiry_status(): void
    {
        $inquiry = Inquiry::create([
            'type'              => 'rfp',
            'name'              => 'Dr. Charlie Lee',
            'email'             => 'charlie@pharma.com',
            'phase'             => 'Phase I',
            'therapeutic_focus' => 'Immunology',
            'status'            => 'new',
        ]);

        $response = $this->actingAs($this->admin)->patch("/admin/inquiries/{$inquiry->id}/status", [
            'status' => 'in_review',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('inquiries', [
            'id'     => $inquiry->id,
            'status' => 'in_review',
        ]);
    }

    public function test_admin_can_logout(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/logout');
        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }
}
