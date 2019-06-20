<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eventos')->insert(
            [
                [
                    'categoria' => 'Futebol',
                    'cidade' => 'Natal',
                    'data' => '2019-06-20',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'categoria' => 'Futebol',
                    'cidade' => 'Recife',
                    'data' => '2019-06-27',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'categoria' => 'Show',
                    'cidade' => 'Natal',
                    'data' => '2019-06-28',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'categoria' => 'Futebol',
                    'cidade' => 'João Pessoa',
                    'data' => '2019-07-02',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'categoria' => 'Show',
                    'cidade' => 'Recife',
                    'data' => '2019-07-09',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
            ]
        );

        DB::table('clientes')->insert(
            [
                [
                    'nome' => 'Tiago',
                    'cpf' => '12345678900',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'nome' => 'Fulano',
                    'cpf' => '74185296300',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'nome' => 'Ciclano',
                    'cpf' => '98765432100',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
            ]
        );

        DB::table('tipo_ingressos')->insert(
            [
                [
                    'tipo' => 'inteira',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'tipo' => 'meia',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],
                [
                    'tipo' => 'gratuidade',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            ]
        );

        for ($i = 10; $i < 14; $i++) {
            DB::table('ingressos')->insert(
                [
                    [
                        'preco' => 100,
                        'zona' => 'arquibancada',
                        'cadeira' => '0' . $i,
                        'tipo_ingresso_id' => '1',
                        'evento_id' => '1',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                    [
                        'preco' => 50,
                        'zona' => 'arquibancada',
                        'cadeira' => '1' . $i,
                        'tipo_ingresso_id' => '2',
                        'evento_id' => '1',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],

                    [
                        'preco' => 250,
                        'zona' => 'camarote',
                        'cadeira' => '0' . $i,
                        'tipo_ingresso_id' => '1',
                        'evento_id' => '1',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                    [
                        'preco' => 125,
                        'zona' => 'camarote',
                        'cadeira' => '1' . $i,
                        'tipo_ingresso_id' => '2',
                        'evento_id' => '1',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],





                    [
                        'preco' => 8000,
                        'zona' => 'arquibancada',
                        'cadeira' => '0' . $i,
                        'tipo_ingresso_id' => '1',
                        'evento_id' => '2',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                    [
                        'preco' => 4000,
                        'zona' => 'arquibancada',
                        'cadeira' => '1' . $i,
                        'tipo_ingresso_id' => '2',
                        'evento_id' => '2',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],

                    [
                        'preco' => 15000,
                        'zona' => 'camarote',
                        'cadeira' => '0' . $i,
                        'tipo_ingresso_id' => '1',
                        'evento_id' => '2',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                    [
                        'preco' => 7500,
                        'zona' => 'camarote',
                        'cadeira' => '1' . $i,
                        'tipo_ingresso_id' => '2',
                        'evento_id' => '2',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],





                    [
                        'preco' => 80,
                        'zona' => 'arquibancada',
                        'cadeira' => '0' . $i,
                        'tipo_ingresso_id' => '1',
                        'evento_id' => '3',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                    [
                        'preco' => 40,
                        'zona' => 'arquibancada',
                        'cadeira' => '1' . $i,
                        'tipo_ingresso_id' => '2',
                        'evento_id' => '3',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],

                    [
                        'preco' => 150,
                        'zona' => 'camarote',
                        'cadeira' => '0' . $i,
                        'tipo_ingresso_id' => '1',
                        'evento_id' => '3',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                    [
                        'preco' => 75,
                        'zona' => 'camarote',
                        'cadeira' => '1' . $i,
                        'tipo_ingresso_id' => '2',
                        'evento_id' => '3',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
                    ],
                ]
            );
        }

        DB::table('ingressos')->insert(
            [
                [
                    'preco' => 0,
                    'zona' => 'arquibancada',
                    'cadeira' => '2' . $i,
                    'tipo_ingresso_id' => '3',
                    'evento_id' => '1',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ],

                [
                    'preco' => 0,
                    'zona' => 'camarote',
                    'cadeira' => '3' . $i,
                    'tipo_ingresso_id' => '3',
                    'evento_id' => '1',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]
            ]
        );

        DB::table('users')->insert(
            [
                'email' => 'tiago@gmail.com',
                'password' => Hash::make('123456'),
                'name' => 'Tiago Batista'
            ]
        );
    }
}
