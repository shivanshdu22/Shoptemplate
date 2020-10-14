<?php include ("header.php");?>
	  <?php include ("sidebar.php");
			include ("config.php");
			$fine=0;
			$error= array();
			if(isset($_POST['submit'])){
				$prodcut=isset($_POST['Name'])?$_POST['Name']:'';
				$Price=isset($_POST['Price'])?$_POST['Price']:'';
				$img=isset($_POST['img'])?$_POST['img']:'';
				$category=isset($_POST['category'])?$_POST['category']:'';
				$tag=isset($_POST['tag'])?$_POST['tag']:'';
				$des=isset($_POST['Desc'])?$_POST['Desc']:'';
								
				if(sizeof($error)==0){
					$sql = "INSERT INTO products(category_id, name, price, image, tag, long_des) VALUES ('".$category."','".$prodcut."', '".$Price."', '".$img."', '".$tag."', '".$des."')";

					if ($conn->query($sql) === true) {
					  $fine=1;
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					  $error=array('input'=>'dberror','msg'=>"". $conn->error);
					}

				
				}
				
			}
	  ?>
	  	  
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<!--<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>-->
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Product List</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Table</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Forms</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<?php if($fine==1):?>
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								Product added Successfully
							</div>
						</div>
						<?php endif;?>
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Tags</th>
								   <th>Name</th>
								   <th>Price</th>
								   <th>Category</th>
								   <th>Options</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number  current" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								
									<?php $sql = "SELECT * FROM products"; ?>
									<?php $result = $conn->query($sql);?>
									<?php
									if ($result->num_rows > 0) {
									  // output data of each row
									  while($row = $result->fetch_assoc()) {?>
										<tr>
											<td><input type="checkbox" /></td>
											<td><?php echo $row['tag'];?></td>
											<td><a href="#" title="title"><?php echo $row['name'];?></a></td>
											<td><?php echo $row['price'];?></td>
											<td><?php echo $row['category_id'];?></td>
											<td>
												<!-- Icons -->
												<a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
												<a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
												<a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
											</td>
										</tr>
									  <?php }
									} ?>
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="products.php" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Name of Product</label>
										<input class="text-input small-input" type="text" id="small-input" name="Name" required /> 
										<!--<span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the product</small>
								</p>
								
								<p>
									<label>Price</label>
										<input class="text-input small-input" type="number" id="small-input" name="Price" required  /> 
										<!--<span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
								</p>
								<p>
									<label>Upload Image</label>
									<input type="file" name="img" accept="image/*" required >	
								</p>
								<p>
									<label>Category</label>              
									<select name="category" class="small-input">
										<option value="1">Men</option>
										<option value="2">Women</option>
										<option value="3">Children</option>
										<option value="4">Vintage</option>
									</select> 
								</p>
																
								<p>
									<label>Tags</label>
									<input type="checkbox" name="tag" value="Fashion"/> Fashion
									<input type="checkbox" name="tag" value="Shop" /> Shop
									<input type="checkbox" name="tag" value="Laptop"/>Laptop
									<input type="checkbox" name="tag" value="Electronics" />Electronics 
									<input type="checkbox" name="tag" value="Headphone"/> Headphone
								</p>
								
																
								
								
								<p>
									<label>Description</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="Desc" cols="79" rows="15" required ></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" name="submit" value="Submit" >
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>Content box left</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-right closed-box">
				
				<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<h3>Content box right</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box is closed by default</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			<!--
			<div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>-->
			
			<!-- End Notifications -->
			
<?php include("footer.php"); ?> 			