<?php get_header(); ?>

<section class="container">
	<h1 class="hid">Body</h1>
	<div class="row">
		<article id="intro_con" class="fivecol">
			<h2 class="hid">My images and welcome Email me</h2>
			<img id="me" src="images/me.jpg" alt="me">
			<p class="introPar cen">I am Pan, contact me if you are interested in my online portforlio! Simply say hi or leave me a message!</p>
			</article>
		
		<div class="twocol">
			
		</div>
		
		<section class="fivecol last">
			<h2 class="hid">Contact Form</h2>
			<!--
			<form action="MAILTO:panbanglanfeng@gmail.com" method="post" enctype="text/plain">
			-->
			<form action="includes/contactForm.php" method="post" >
				<fieldset>
					<div>
						<label class="cusInfo" ><span class="ch">姓名</span><br>Your Name</label> 
						<input required="required" id="cusName" class="rounded sLine" name="uName" type="text"><br>
					</div>
					
					<div>
				<label class="cusInfo" ><span class="ch">邮箱</span><br>Email Address</label> 
				<input id="mail" required="required" class="rounded sLine" name="uEmail" type="email"><br>
					</div>
					
					
					<div id="msg">
					<label class="cusInfo" ><span class="ch"> 讯息</span>
						<br>Message<br>
						<button id="sub"  name="sub" type="submit">Submit<br><span class="ch">提交</span></button>
					</label> 
				
					<textArea required="required" name="uMsg" rows="15" class="rounded" ></textArea><br>
				
					</div>
				
				</fieldset>
			</form>
		</section>

	</div>
</section>

<div class="container">
	<div class="row">
		<div class="twocol">

		</div>
		
		<div class="eightcol">
			<img src="images/imgBottom.png" width="746" height="315" alt=" ">
		</div>
		
		<div class="twocol last">
		
		</div>

	</div>
</div>

<?php get_footer();?>