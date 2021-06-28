<?php

use App\Xfly\Model\User;
use App\Xfly\Model\Drone;
use App\Xfly\Model\Address;
use App\Xfly\Model\Company;
use App\Xfly\Model\Contact;
use App\Xfly\Model\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $companyId;

    public function run()
    {
        $this->CreateUser();
        $this->CreateCompany();
        $this->CreateDrone();
        $this->CreateProduct();
    }

    private function CreateUser()
    {
        User::create([
            'name' => 'Administrador Ruby',
            'email' => 'ruby@adm.com.br',
            'token' => null,
            'password' => bcrypt('qwe123QWE'),
            'financial' => 1,
        ]);
    }

    private function CreateCompany()
    {
        Company::create([
            'name' => 'Ruby Development',
            'real_name' => 'Ruby LTDA',
            'cnpj' => '76.123.521/0001-06',
            'email' => 'ruby@corporation.com.br',
            'avatar' => 'nullAvatar.png',
            'owner' => 'Lucas Ramos Domingues',
            'municipal_registration' => '111.111.11.11',
            'state_registration' => '111.111.111.111',
        ]);

        $this->companyId = Company::where('email', 'ruby@corporation.com.br')->first();

        Address::create([
            'street' => 'Av. Nações Unidas, 58-50 - Nucleo Res. Pres. Geisel',
            'complement' => '',
            'zipcode' => '17033-260',
            'city' => 'Bauru',
            'state' => 'São Paulo',
            'country' => 'Brasil',
            'company_id' => $this->companyId->id,
        ]);

        Contact::create([
            'name' => 'Jackeline Marino Lucas',
            'number' => '(14)98232-0783',
            'department' => 'TI',
            'email' => 'jackie.marino@gmail.com',
            'company_id' => $this->companyId->id,
        ]);
    }

    private function CreateDrone()
    {
        Drone::create([
            'model' => 'X800 BIO',
            'key' => 1,
            'status' => 'Liberado',
            'description' => 'Novo de fábrica',
            'production_date' => date('Y-m-d'),
            'purchase_date' => date('Y-m-d'),
            'company_id' => $this->companyId->id,
        ]);
    }

    private function CreateProduct()
    {
        Product::create([
            'model' => 'Drone de filmagem',
            'image' => 'nullImage.png',
            'price' => '120,00',
            'description' => 'Esse drone servirá para filmagens aéreas',
            'company_id' => $this->companyId->id,
        ]);
    }
}
