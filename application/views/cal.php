
 <?php include('header.php') ?>
<div class="container">
<div class="calculator calcu" >
	 <?php if($this->session->flashdata('success')){ ?> <p class="alert alert-success"><?= $this->session->flashdata('success')?></p> <?php } ?>
	   <a href="<?=base_url();?>calculator/calculation_list" class=""> <button>CALCULATION LIST</button></a>
 <div class="row">
 
    <input class="display-box" type="text" id="result" disabled  name="output" /> 
 
    <!-- clearScreen() function clears all the values -->
     <input type="button" value="C" onclick="clearScreen()" id="btn" /> 
  </div>

 <div class="row">
     <input type="button" value="1" onclick="display('1')" /> 
     <input type="button" value="2" onclick="display('2')" /> 
     <input type="button" value="3" onclick="display('3')" /> 
     <input type="button" value="-" onclick="display('/')" /> 
  </div>
 <div class="row">
     <input type="button" value="4" onclick="display('4')" /> 
     <input type="button" value="5" onclick="display('5')" /> 
     <input type="button" value="6" onclick="display('6')" /> 
     <input type="button" value="-" onclick="display('-')" /> 
  </div>
 <div class="row">
     <input type="button" value="7" onclick="display('7')" /> 
     <input type="button" value="8" onclick="display('8')" /> 
     <input type="button" value="9" onclick="display('9')" /> 
     <input type="button" value="+" onclick="display('+')" /> 
  </div>
 <div class="row">
     <input type="button" value="." onclick="display('.')" /> 
     <input type="button" value="0" onclick="display('0')" /> 
  <!-- calculate() function evaluates the mathematical expression -->
   <input type="button" value="=" onclick="calculate()" id="btn" /> 
     <input type="button" value="*" onclick="display('*')" /> 
  </div>

<div class="text-center">
    
   </div>
 
</div>

  <?php echo form_open('calculator/calulate',['class'=>'normalform']);?>
  <?php echo form_input(['name'=>'output','placeholder'=>'Enter category name','class'=>'form-control','id'=>'result1', 'type'=>'hidden']) ?>
    <?php echo form_submit(['name'=>'submit','class'=>'btn btn-danger','value'=>'SUBMIT']) ?>
  </form>


</body>
 
</html>