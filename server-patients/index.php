<?php

use Phalcon\Mvc\Micro;
use Phalcon\Autoload\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
use Phalcon\Http\Response;

$loader = new Loader();

$loader->setNamespaces(
    [
        'MyApp\Models' => __DIR__ . '/models/',
    ]
);

$loader->register();

$container = new FactoryDefault();

$container->set(
    'db',
    function () {
        return new PdoMysql(
            [
                'host'     => 'localhost',
                'username' => 'admin',
                'password' => 'User@dm1n02',
                'dbname'   => 'patientDB',
            ]
        );
    }
);

$app = new Micro($container);

$app->get(
    '/api/patients',
    function () use ($app) {
        $phql = 'SELECT * '
              . 'FROM MyApp\Models\Patient '
              . 'ORDER BY name'
        ;

        $patients = $app
            ->modelsManager
            ->executeQuery($phql)
        ;

        $response = new Response();
        $data = [];

        foreach ($patients as $patient) {
            $data[] = [
                'id'   => $patient->id,
                'name' => $patient->name,
                'sex' => $patient->sex,
                'religion' => $patient->religion,
                'phone' => $patient->phone,
                'nik' => $patient->nik,
            ];
        }

        $response->setJsonContent(
            [
                'status'   => [
                    'code' => 200,
                    'response' => "success",
                    'message' => "success get all patients"
                ],
                'result' => $data,
            ]
        );
        
        return $response;
    }
);

$app->get(
    '/api/patients/{id:[0-9]+}',
    function ($id) use ($app) {
        $phql = 'SELECT * '
              . 'FROM MyApp\Models\Patient '
              . 'WHERE id = :id:'
        ;

        $patient = $app
            ->modelsManager
            ->executeQuery(
                $phql,
                [
                    'id' => $id,
                ]
            )
            ->getFirst()
        ;

        $response = new Response();
        if (!$patient) {
            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 404,
                        'response' => "not found",
                        'message' => "data not found"
                    ],
                ]
            );
        } else {
            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 200,
                        'response' => "success",
                        'message' => "success get sigle patient"
                    ],
                    'result'   => [
                        'id'   => $patient->id,
                        'name' => $patient->name,
                        'sex' => $patient->sex,
                        'religion' => $patient->religion,
                        'phone' => $patient->phone,
                        'nik' => $patient->nik,
                    ]
                ]
            );
        }

        return $response;
    }
);

$app->post(
    '/api/patients',
    function () use ($app) {
        $patient = $app->request->getJsonRawBody();
        $phql  = 'INSERT INTO MyApp\Models\Patient '
               . '(name, sex, religion, phone, nik) '
               . 'VALUES '
               . '(:name:, :sex:, :religion:, :phone:, :nik:)'
        ;

        $status = $app
            ->modelsManager
            ->executeQuery(
                $phql,
                [
                    'name' => $patient->name,
                    'sex' => $patient->sex,
                    'religion' => $patient->religion,
                    'phone' => $patient->phone,
                    'nik' => $patient->nik,
                ]
            )
        ;

        $response = new Response();

        if ($status->success() === true) {
            $response->setStatusCode(201, 'Created');

            $patient->id = $status->getModel()->id;

            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 201,
                        'response' => "success",
                        'message' => "success create new patient"
                    ],
                    'result'   => $patient,
                ]
            );
        } else {
            $response->setStatusCode(409, 'Conflict');

            $errors = [];
            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 409,
                        'response' => "error",
                        'messages' => $errors,
                    ],
                    'result' => ''
                ]
            );
        }

        return $response;
    }
);

$app->put(
    '/api/patients/{id:[0-9]+}',
    function ($id) use ($app) {
        $patient = $app->request->getJsonRawBody();
        $phql  = 'UPDATE MyApp\Models\Patient '
               . 'SET name = :name:, sex = :sex:, religion = :religion:, phone = :phone:, nik = :nik: '
               . 'WHERE id = :id:';

        $status = $app
            ->modelsManager
            ->executeQuery(
                $phql,
                [
                    'id'   => $id,
                    'name' => $patient->name,
                    'sex' => $patient->sex,
                    'religion' => $patient->religion,
                    'phone' => $patient->phone,
                    'nik' => $patient->nik,
                ]
            )
        ;

        $response = new Response();

        if ($status->success() === true) {
            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 200,
                        'response' => "success",
                        'message' => "success update data"
                    ],
                    'result'   => $patient,
                ]
            );
        } else {
            $response->setStatusCode(409, 'Conflict');

            $errors = [];
            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 409,
                        'response' => "error",
                        'messages' => $errors,
                    ],
                    'result' => ''
                ]
            );
        }

        return $response;
    }
);

$app->delete(
    '/api/patients/{id:[0-9]+}',
    function ($id) use ($app) {
        $phql = 'DELETE '
              . 'FROM MyApp\Models\Patient '
              . 'WHERE id = :id:';

        $status = $app
            ->modelsManager
            ->executeQuery(
                $phql,
                [
                    'id' => $id,
                ]
            )
        ;

        $response = new Response();

        if ($status->success() === true) {
            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 200,
                        'response' => "success",
                        'messages' => "success delete data",
                    ],
                    'result' => ''
                ]
            );
        } else {
            $response->setStatusCode(409, 'Conflict');

            $errors = [];
            foreach ($status->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $response->setJsonContent(
                [
                    'status'   => [
                        'code' => 409,
                        'response' => "error",
                        'messages' => $errors,
                    ],
                    'result' => ''
                ]
            );
        }

        return $response;
    }
);

$app->handle(
    $_SERVER["REQUEST_URI"]
);




