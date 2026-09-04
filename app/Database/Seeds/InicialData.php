<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InicialData extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'          => 1,
                'equipamento' => 'CFW-09',
                'fabricante'  => 'WEG',
                'descricao'   => 'Inversor de Frequência',
            ],
            [
                'id'          => 2,
                'equipamento' => 'VFF4+',
                'fabricante'  => 'Fermator',
                'descricao'   => 'Operador de Porta',
            ],
            [
                'id'          => 9,
                'equipamento' => 'V1000',
                'fabricante'  => 'Yaskawa',
                'descricao'   => 'Inversor de Frequência',
            ],
            [
                'id'          => 10,
                'equipamento' => 'JV0271',
                'fabricante'  => 'Atlas',
                'descricao'   => 'Placa CPU',
            ],
            [
                'id'          => 11,
                'equipamento' => 'GECB-2',
                'fabricante'  => 'OTIS',
                'descricao'   => null,
            ],
            [
                'id'          => 24,
                'equipamento' => 'MCP5',
                'fabricante'  => 'OTIS',
                'descricao'   => 'Placa de Controle',
            ],
        ];

        // Insere em lote (batch) na tabela "equipamentos"
        $this->db->table('equipamentos')->insertBatch($data);
    }
}
