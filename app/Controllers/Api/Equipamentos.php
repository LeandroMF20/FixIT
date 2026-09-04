<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\EquipamentosModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

//FIXME: Não está sendo usado o RESTful Controller do CodeIgniter
class Equipamentos extends BaseController
{    
    private EquipamentosModel $model;    

    public function __construct()
    {
        $this->model = new EquipamentosModel();
    }

    //FIXME: Falta implementar validação de formulário
    public function add() 
    {
        $jsonData = $this->request->getJSON();
        
        try {
            //FIXME: falta disparar erros de validação de dados (como o campo obrigatório de 'equipamento')
            $id = $this->model->insert([
                'equipamento' => $jsonData->equipamento,
                'fabricante'  => $jsonData->fabricante ?? null,
                'descricao'   => $jsonData->descricao ?? null,
            ]);

            if (!$id) {
                throw new DatabaseException('Erro ao tentar criar um novo registro.');
            }
        
            return $this->response->setStatusCode(201)->setJSON([
                'status' => 'success',
                'message' => 'Registro criado com sucesso',
                'data' => [
                    'id' => $id,
                ],
            ]);
        } catch (DatabaseException $e) {
            if(str_contains($e, 'UNIQUE constraint failed')){
                return $this->response->setStatusCode(400)->setJSON([
                    'status'  => 'warning',
                    'message' => 'Equipamento já adicionado',
                    'errors'  => $this->model->errors(),
                ]);
            } else {
                return $this->response->setStatusCode(400)->setJSON([
                    'status'  => 'error',
                    'message' => 'Erro ao salvar equipamento no banco de dados',
                    'errors'  => $this->model->errors(),
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => 'Erro ao processar a adição de um novo registro',
                'errors'  => $e->getMessage(),
            ]);
        }
    }

    public function getList()
    {
        try {
            $results = $this->model->findAll();
            return $this->response->setJSON($results);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => 'Erro ao listar equipamentos',
                'errors'  => $e->getMessage(),
            ]);
        }
    }
}
