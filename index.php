<?php require ('view/header.php');
/*
*  Tree Implementation:
*
* a node can have multiple children.
* Here we define a parent node and its
* children
*
*/


/*
*******************************************************************************************
*   class TreeNode :
*   The purpose of this class is to define the node structure
*   of our tree.
*
*   Here we do not restrict any degree for a particular node
*   the following nodes being defined can have multiple
*   children.
*
*
*******************************************************************************************
*/


class TreeNode {
  public $data = NULL;
  public $children = [];

// data insertion
 public function __construct(string $data = NULL) {
 	  $this->data = $data;
 }

// append children nodes to an array so that we can
// add multiple nodes as children

//define method for adding a child to a node
 public function addChildren(TreeNode $node) {
  	$this->children[] = $node;
 }
}





/*
*******************************************************************************************
*   class Tree :
*   The purpose of this class is to define the root node of the tree, as
*   well as to define a method which allows us to traverse and visit each
*   node of the tree.
*
*
*
*
*
*******************************************************************************************
*/

// here we will define the root node of the tree
class Tree {
  public $root = NULL;
  public function __construct(TreeNode $node) {
 	  $this->root = $node;
  }

// here we will traverse this tree
// the goal is to visit each child nodes
// and then call a recursive method to
// get the children of the current node.
  public function traverse(TreeNode $node, int $level = 0) {
// each different level node itereates on next line
 	  if ($node) {
 	    echo str_repeat('<i class="material-icons">chevron_right</i>', $level);
 	    echo $node->data . "\n";

 	    foreach ($node->children as $childNode) {
 		    $this->traverse($childNode, $level + 1);
 	    }
   	}
  }

}


try {


  echo '<div class="row">';
  echo '<div class="col s12">';



       // level 0
       $ceo = new TreeNode('<button class="btn-small tooltipped waves-effect
       waves-light hoverable" type="submit" name="action" data-position="right"
       data-tooltip="I am root">CEO</button></br>');
       // defines root node
       //$tree = new Tree($ceo);

       $tree = new Tree($ceo);

       // level 1
       $cto = new TreeNode('<button class="btn-small tooltipped waves-effect
       waves-light hoverable" type="submit" name="action" data-position="right"
       data-tooltip="I am a child">CTO</button></br>');
       $cfo = new TreeNode('<button class="btn-small waves-effect waves-light hoverable" type="submit" name="action">CFO</button></br>');
       $cmo = new TreeNode('<button class="btn-small waves-effect waves-light hoverable" type="submit" name="action">CMO</button></br>');
       $coo = new TreeNode('<button class="btn-small waves-effect waves-light hoverable" type="submit" name="action">COO</button></br>');


       // level 2
       $seniorArchitect = new TreeNode('<button class="btn-small waves-effect waves-light hoverable" type="submit" name="action">Senior Architect</button></br>');
       $userInterfaceDesigner	= new TreeNode('<button class="btn-small waves-effect waves-light hoverable" type="submit" name="action">User Interface Designer</button></br>');
       $qualityAssuranceEngineer = new TreeNode('<button class="btn-small waves-effect waves-light
       hoverable" type="submit" name="action">Quality Assurance Engineer</button></br></div>');



       // level 3
       $softwareEngineer = new TreeNode('<button class="btn-small waves-effect waves-light hoverable" type="submit" name="action">Software Engineer</button></br>');


       // how to define where the children are inserted into the tree

       // first level insertions
       $ceo->addChildren($cto);
       $ceo->addChildren($cfo);
       $ceo->addChildren($cmo);
       $ceo->addChildren($coo);


       // second level insertions
       $cto->addChildren($seniorArchitect);
       $cto->addChildren($qualityAssuranceEngineer);
       $cto->addChildren($userInterfaceDesigner);

       // third level insertions
       $seniorArchitect->addChildren($softwareEngineer);



       $tree->traverse($tree->root);

       echo '</div>';
        echo '</div>';

   } catch (Exception $e) {
       echo $e->getMessage();
   }

   ?>



 <?php
 require 'view/footer.php'; ?>
