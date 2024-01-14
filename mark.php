<html>
    <body>
        
        <?php
            class print_mark{
                public $nema_mat = array();
                public $mid1 =array(); 
                public $mid2 =array();
                public $final =array();
                public $total =array();
                public function tek1(){
                    echo '<form action="mark.php" method="POST">
                    <h3>ادخل عدد المواد</h3>
                    <input type="text" name="leng">    
                    <input type="submit" name="submit">
                    </from>';
                    
                }
                function tek2(){
                    echo '<form action="mark.php" method="POST">';
                    echo '<h3>ادخل اسماء المواد</h3>';
                    for($i = 0 ; $i<$_POST['leng'] ; $i++){
                        echo'المادة'.$i+1;
                        echo'<input type="text" name="name_mat'.$i.'"><br><p>';      
                    } 
                    echo '<h3>ادخل درجات الاختبارات</h3>';
                    for($i = 0 ; $i<$_POST['leng'] ; $i++){
                        echo 'درجات المادة'.$i+1..'<br>';
                        echo '<input type="text" name="mid1'.$i.'"><label>mid1</label>
                        <input type="text" name="mid2'.$i.'"><label>mid2</label>
                        <input type="text" name="final'.$i.'"><label>fianl</label>
                        <br><br>';
                    }
                    echo '<input type="text" name="tol"><label>تاكيد عدد المواد المسجلة</label><br><br>';
                    echo '<input type="submit" name="submit2">';
                    echo '</from>';
                }
                function insert(){
                    for($i=0 ; $i< $_POST['tol'] ;$i++){
                    $nema_mat[$i] = $_POST['name_mat'.$i];
                    $mid1[$i] =$_POST['mid1'.$i]; 
                    $mid2[$i] =$_POST['mid2'.$i];
                    $final[$i] =$_POST['final'.$i];   
                    $total[$i]=$mid1[$i]+$mid2[$i]+$final[$i];
                    }
                    
                    echo '<br>'.'  Course  '."".'  mark   '.'   '.'   grade  '.'<br>';
                    echo '----------------------------------';
                    for($i = 0 ; $i<$_POST['tol'];$i++){
                        
                        if($total[$i]<=100 AND $total[$i]>=90){
                            $gr = 'A';
                        }elseif($total[$i]>=80 AND $total[$i]<=89){
                            $gr = 'B';
                        }elseif($total[$i]>=70 AND$total[$i]<=79){
                            $gr = 'C';
                        }elseif($total[$i]>=60 AND$total[$i]<=69){
                            $gr = 'D';
                        }elseif($total[$i]<=59){
                            $gr ='F';
                        }
                    echo '<br>'.$nema_mat[$i] ,"\t". $total[$i] ,"\t". $gr;
                    }
                }
            }
        
        $inn = new print_mark();
        $inn ->tek1();
        if(isset($_POST['submit'])){
            $inn->tek2();
        }
        
        
        if(isset($_POST['submit2'])){
            $inn->insert();
        }
        ?>
    </body>
</html>