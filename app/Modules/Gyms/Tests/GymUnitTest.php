<?php

namespace App\Modules\Gyms\Tests;

use App\Modules\Gyms\Models\Gym;
use App\Modules\Gyms\Models\GymInfos;
use App\Modules\Users\Models\User;
use TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class GymUnitTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testCreateGym()
    {
        $user = factory(User::class)->create();

        $gym_data = [
            'name' => 'Gym Test',
            'legal_name' => 'Gym Test Legal Name SA',
            'register' => '01.082.19721/0001-09',
            'responsable' => 'Gyms Responsable'
        ];

        $this->post('/v1/gyms', $gym_data, $this->headers($user))
            ->seeJson(['message' => 'gym_created']);

        $gym = Gym::first();

        $this->assertArraySubset($gym_data, $gym->toArray());
    }

    public function testCreateGymInfos()
    {
        $user = factory(User::class)->create();
        $gym = Gym::first();

        $infos = [
            'gyms_id' => $gym->id,
            'address' => 'Grym Adrress Test',
            'number' => '28A',
            'complement' => 'Testing',
            'zipcode' => '123456-098',
            'state' => 'MA',
            'city' => 'São Luís',
            'email' => 'gym-test@gmail.com',
            'telehpone' => '(98) 4001-0000',
            'telehpone2' => '(98) 4001-0001',
            'website' => 'http://gym-test.com',
            'logo' => 'http://webneel.com/sites/default/files/images/manual/logo-all/10-gym-fitness-logo-design.gif',
            'lati' => '-2.0192830129380129',
            'long' => '4.0192830129380129',
        ];

        $res = $this->post('v1/gyms/infos', $infos, $this->headers($user))
            ->seeJson(['message' => 'gym_infos_created']);

        $infos = GymInfos::first();

        $this->seeStatusCode(200);
    }

//    public function testeDeleteGym()
//    {
//        $this->delete('v1/gyms/'.$this->gym->id, $this->headers($this->user))
//            ->seeJson(['message' => 'gym_deleted']);
//    }

}