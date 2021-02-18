<?php
  require 'dbconfig/config.php';
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Generate Bill</title>  
           <link rel="stylesheet" href="style.css" />            
      </head>  
      <body>  
         <br />
           <header>
              <nav>
                    <h1>E-Waste Management</h1>
                    <ul id="nav">
                    <li><a class="homered" href="product.php">BACK</a></li>
                    </ul>
              </nav>
            </header>

           <div class="container">  
                <h1 align="center">Generate Bill</h1><br />  
                <div class="table">  
                	<div class="col-md-12" align="right">
                     <form action="prbill.php" method="post">  
                          <input type="submit" name="generate_pdf" class="btn" value="Generate Bill" />  
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                        <tr>  
                          <th width="5%">Id</th>  
			                    <th width="30%">Prod_Name</th> 
			                    <th width="10%">Prod_Price</th>  
			                    <th width="30%">Prod_Company</th>  
			                    <th width="20%">Prod_Model</th>
                          <th width="20%">Prod_Date</th>
                          <th width="20%">Total</th>
                          
		                    </tr>  
                     
                    </table>  
                </div>  
           </div>  
      </body>  
</html>  

