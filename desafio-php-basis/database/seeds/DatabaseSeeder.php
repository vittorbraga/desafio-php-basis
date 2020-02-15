<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('filials')->insert([
            'nome' => 'Filial 1',
            'endereco' => 'Endereco, 1',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'ES',
            'inscricao_estadual' => 'ISENTO',
            'cnpj' => '00123456000178'
        ]);
        DB::table('users')->insert([
            'name' => 'Vitor Braga',
            'data_nascimento' => '1991-03-16',
            'sexo' => 'M',
            'cpf' => '12345678900',
            'endereco' => 'Rua Luiz Murad, 2',
            'bairro' => 'Vista da Serra',
            'cidade' => 'Colatina',
            'uf' => 'ES',
            'cargo' => 'Desenvolvedor',
            'salario' => '100.00',
            'situacao' => '1',
            'password' => bcrypt('123456'),
            'id_filial' => '1'
        ]);
    }
}
