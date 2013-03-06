<?php
interface DaoInterface {
	public function insert();
	public function update();
	public function delete();
	public function findAll();
	public function findById();
}