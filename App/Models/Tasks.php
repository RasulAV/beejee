<?php
namespace App\Models;

use PDO;

/**
 * Tasks model
 *
 * PHP version 7.3
 */
class Tasks extends \Core\Model
{
	/**
	*	Count overall rows amound for paginator
	*
	*	@param integer $pageno Current page number
	*	@param integer $limit How many post need to be shown
	*
	*	@return integer $num Amount of posts
	*/
	public static function countRows($pageno, $limit)
	{
		$db= static::getDB();
		
		$sql = "SELECT count(*) FROM tasks";
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
				
		$pagecount= $stmt->fetchColumn();
		$num = ceil($pagecount/$limit);
		
		return $num;//$result = array("num"=>$num, "pageno"=>$pageno, "limit"=>$limit);
	}
	
	/**
	*	Get tasks 
	*
	*	@param integer 	$pageno - Current page number
	*	@param integer 	$limit - How many post need to be shown
	*	@param string 	$orderby - Order by 
	*	@param string 	$ascdesc - Sort the records in descending/ascending order
	*
	*	@return array 
	*/
	public static function getAll($pageno, $limit, $orderby, $ascdesc)
	{
		$startpoint = ($pageno * $limit) - $limit;
				
		$db= static::getDB();

		$sql= "SELECT * FROM tasks";
					
		//$sql.= !is_null($where) ? " WHERE $where" : '';
		$sql.= " ORDER BY $orderby $ascdesc";
		$sql.= " LIMIT :startpoint, :limit;";
		
		$stmt= $db->prepare($sql);
		
		if (!is_null($pageno) && !is_null($limit) ) {
			$stmt->bindValue(':startpoint', $startpoint, PDO::PARAM_INT);
			$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);	
		};
		
		$stmt->execute();
		
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/**
	*	Add Task to DB
	*
	*	@param string $name - Name of person
	*	@param string $email - Email person
	*	@param string $descr - Description of the task
	*
	*	@return boolean - True if successed
	*/
	public static function add($name, $email, $descr)
	{
		$db= static::getDB();
		
		$sql= "INSERT INTO tasks ( name, email, descr ) VALUES (:name, :email, :descr)";
		
		$stmt= $db->prepare($sql);
		$stmt->bindValue(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':email', $email, PDO::PARAM_STR);
		$stmt->bindValue(':descr', $descr, PDO::PARAM_STR);
		
		return $stmt->execute();
	}
	
	/**
	*	Edit one specified Task
	*
	*	@param integer $id - Query task by id
	*
	*	@return array - Task data
	*/
	public static function edit($id)
	{
		$db= static::getDB();
		
		$sql= "SELECT * FROM tasks WHERE id= :id";
		
		$stmt= $db->prepare($sql);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);	
		$stmt->execute();
		$results= $stmt->fetch(PDO::FETCH_ASSOC);

		return $results;
	}
	
	/**
	*	Update specified Task
	*
	*	@param integer 	$id - update by id
	*	@param string 	$descr - Description of the task
	*	@param boolean 	$isdone - If task fulfilled
	*
	*	@return boolean - True if successed
	*/
	public static function update($id, $descr, $isdone)
	{
		$db= static::getDB();
		
		$sql= "UPDATE tasks SET descr= :descr, isdone= :isdone, istouched= '1'  WHERE id= :id";
		
		$stmt= $db->prepare($sql);
		$stmt->bindValue(':descr', $descr, PDO::PARAM_STR);
		$stmt->bindValue(':isdone', $isdone, PDO::PARAM_INT);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		
		return $stmt->execute();
	}
}