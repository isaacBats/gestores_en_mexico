<?php 

use Olive\controllers\Controller;

class CategoryController extends Controller
{

    private $categoryRepo;

    public function __construct()
    {
        $this->categoryRepo = new CategoryRepo();
    }

    public function index($req, $res)
    {
        $categories = $this->categoryRepo->all();

        return $this->renderView($res, 'Category.index', compact('categories'));
    }

}