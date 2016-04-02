<?php namespace Cinema\Http\Controllers;

class PruebaController extends Controller{

	public function index()
	{
		return "Hola desde PruebaController.php";
	}

	public function nombre($nombre)
	{
		return "Mi nombre es: ".$nombre;
	}
}