<?php
include __DIR__ . '/../header.php';
?>

<body data-id="<?= $this->id?>">
<?php
if (isset($_SESSION['user']) && unserialize($_SESSION['user'])->getIsAdmin()) 
{ 
    echo  '<button type="button" class="btn btn-primary" onclick="openEditorModal(\''.$this->id.'\')">Open Editor</button>';
}
echo $this->markup;

?>


</body>
<?php 

  include __DIR__ . '/../modalwysiwyg.php';
?>
<?php
include __DIR__ . '/../footer.php';
?>