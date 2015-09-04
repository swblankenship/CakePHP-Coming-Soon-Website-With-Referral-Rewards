<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>
<?php echo $this->element('title'); ?>

<div id="box"> 
	<div id="top-box">
    <div>
         <h2>Server Error</h2>
        <p>Sorry but something went wrong here, please try again!</p>
        <br  />
        <br  />
        <?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>
    </div>
   </div>
 
</div>


