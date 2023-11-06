<!DOCTYPE html>
<html>
<head>
	<title>Nhập dữ liệu</title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
	<script type="text/javascript">
		
	</script>
	<style type="text/css">
        
		body{
			margin: 70px auto;
			width: 600px;
			height: 450px;
			border: 1px solid black;
			border-radius: 10px;
			background: #3AAFAB;
		}
		
        *{
        	list-style-type: none;
        	box-sizing: border-box;
        }

        .container{
        	width: 598px;
        	height: 448px;
        	background: #F5F5DC;
        	border-radius: 10px;
        }

        .header{
            width: 600px;
            height: 10%;
            padding: 0 5px;
        }

        .content{
            width: 600px;
            height: 90%;
            margin-top: 40px;
        }

        .content-left{
            float: left;
            width: 300px;
            padding-left: 5px;
        }

        .content-right{
            float: right;
            width: 300px;
            padding-left: 5px;
            border-left: 1px;
            border-left-style: solid;
        }

        label + *, 
        span + *{
            display: block;
            width: 263px;
            height: 50px;
            border: 1px solid blue;
            border-radius: 5px;
            margin-left: 10px;
            margin-top: 15px;
            font-size: 20px;
            padding-left: 5px;
            background-color: #BDB76B;
        }
        
        label, span{
        	display: block;
        	width: 75px;
        	margin-top: 25px;
        	margin-left: 22px;
            margin-bottom: -25px;
            padding-left: 5px;
            background: white;
            position: relative;
            z-index: 0;
        }

        .node{
        	margin-left: 10px;
            margin-top: 25px;
			padding: 8px 16px;
            border: none;
            background: #333;
            color: #f2f2f2;
            text-transform: uppercase;
            letter-spacing: .09em;
            border-radius: 2px;
        }

	</style>
</head>
<body>
    <div class="container">
    	<div class="header">
    	    <h1 align="center" style="margin-top: 0px; padding-top: 10px;">Bài tập về nhà</h1>
            <hr />
    	</div>

    	<div class="content">
    		<div class="content-left">
    			<strong style="font-size: 20px; padding-left: 5px; color: #808080">Tính tổng số &lt;= N</strong>
    			<form name="form_total" method="GET">
    				<label for="number">Nhập N</label>
    				<input type="number" name="number" id="number"/>
    			    <span>Chọn kiểu</span>
    				<select name="type" style="font-size: 18px;">
    			        <option value="0" checked>Tính tổng các số chẵn &lt;= N</option>
    					<option value="1">Tính tổng các số lẻ &lt;= N</option>
    					<option value="2">Tính tổng bình phương các số &lt;= N</option>
    					<option value="3">Tính tổng lập phương các số &lt;= N</option>   					  
    				</select>
                    <input type="submit" name="total" class="node" value="Tính" />
                    <?php
                   
                   if(!empty($_GET['number'])){

                       $number = $_GET['number'];
                       
                       $sum = 0;

                       for($i = 1; $i < $number; $i++){
                           
                           if($_GET['type'] == 0){
                              if($i % 2 == 0){
                                 $sum = $sum + $i;
                              }
                           }else if($_GET['type'] == 1){
                              if($i % 2 == 1){
                                 $sum = $sum + $i;
                              }
                           }else if($_GET['type'] == 2){
                              $sum = $sum + $i*$i;
                           }else{
                              $sum = $sum + $i*$i+$i;
                           }
                       }

                       echo "<strong style= \"color: red; padding-left: 10px;\">Kết quả bằng: {$sum}</strong>";

                   }      
                ?>
    			</form>			
    		</div>

            <div class="content-right">
            	<strong style="font-size: 20px; padding-left: 5px; color: #808080">Giải phương trình bậc 2</strong>
            	<form name="form_ptb2" method="GET">
            		<label for="a">Nhập a</label>
            		<input type="number" name="a" id="a">
            		<label for="b">Nhập b</label>
            		<input type="number" name="b" id="b">
            		<label for="c">Nhập c</label>
                    <input type="number" name="c" id="c">
                    <input type="submit" name="count" class="node" value="Tính">
                    <?php
                       
                          function ptb2($a = 0, $b = 0, $c = 0){
                               
                               if(empty($a)) $a = 0;
                               if(empty($b)) $b = 0;
                               if(empty($c)) $c = 0;

                               $benta = $b * $b - 4*$a*$c;
                               
                               if($a == 0){
                                  if($b == 0 && $c == 0){
                                    echo "<strong style= \"color: red; padding-left: 10px;\">Phương trình có vô số nghiệm</strong>";
                                  }else if($b == 0 && $c != 0 ){
                                    echo "<strong style= \"color: red; padding-left: 10px;\">Phương trình vô nghiệm</strong>";
                                  }else{
                                    $x = -$c / $b;
                                    echo "<strong style= \"color: red; padding-left: 10px;\">Phương trình có nghiệm: x= $x</strong>";
                                  }                             
                               }else{
                                  if($benta < 0){
                                    echo "<strong style= \"color: red; padding-left: 10px;\">Phương trình vô nghiệm</strong>";
                                  }else if($benta == 0){
                                    $x = -$b/(2*$a);
                                    echo "<strong style= \"color: red; padding-left: 10px;\">Phương trình có một nghiệm duy nhất: {$x}</strong>"; 
                                  }else if($benta > 0){
                                    $x1 = (-$b - sqrt($benta))/(2*$a);
                                    $x2 = (-$b + sqrt($benta))/(2*$a);
                                    echo "<strong style= \"color: red; padding-left: 10px;\">Phương trình có 2 nghiệm: x1= {$x1}, x2= {$x2} </strong>";
                                  }
                               }
                          }
                           
                          if(!empty($_GET['a']) || !empty($_GET['b']) || !empty($_GET['c']) ){
                              ptb2($_GET['a'], $_GET['b'], $_GET['c']);
                          }  
                         
                    ?>
            	</form>
            </div>
    	</div>
    </div>
</body>
</html>