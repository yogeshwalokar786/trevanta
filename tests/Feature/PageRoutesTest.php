<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    public function test_home_page_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Trevanta International');
    }

    public function test_about_page_loads_successfully(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('ABOUT TREVANTA INTERNATIONAL', false);
    }

    public function test_services_page_loads_successfully(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Comprehensive Clinical Development Services', false);
    }

    public function test_global_page_loads_successfully(): void
    {
        $response = $this->get('/global');
        $response->assertStatus(200);
        $response->assertSee('INTERNATIONAL FOOTPRINT', false);
    }

    public function test_blog_page_loads_successfully(): void
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('SCIENTIFIC INTELLIGENCE UNIT', false);
    }

    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('GET IN TOUCH', false);
    }

    public function test_contact_form_submission_json(): void
    {
        $response = $this->postJson('/contact', [
            'name'         => 'Dr. Jane Smith',
            'email'        => 'jsmith@example.com',
            'organization' => 'BioHealth Labs',
            'phone'        => '+1-555-1234',
            'service'      => 'Clinical Trial Operations',
            'message'      => 'Inquiry regarding Phase II oncology protocol support.',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);
    }

    public function test_rfp_form_submission_json(): void
    {
        $response = $this->postJson('/rfp', [
            'name'              => 'Dr. John Doe',
            'email'             => 'jdoe@sponsor.com',
            'phase'             => 'Phase II (Proof-of-Concept)',
            'therapeutic_focus' => 'Oncology',
            'description'       => 'Phase II multi-center clinical study proposal request.',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
        ]);
    }
}
