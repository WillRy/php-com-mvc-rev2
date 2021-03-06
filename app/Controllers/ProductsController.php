<?php


namespace App\Controllers;


use App\Models\Product;
use SON\Controller;

class ProductsController extends Controller
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $this->render(['table' => $this->model->getTableName()]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // chamo o model e salvo no banco
            // redirectiono para a view
        }

        // renderizo o formulário
    }
}