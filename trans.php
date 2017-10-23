// Матрица тарифов
$c = array(
        array(2,5,2),
        array(4,1,5),
        array(3,6,8)
        );
 
// Запасы груза
$m = array(90,400,110);
 
// Потребности в грузе
$n = array(140,300,160);
 
 
function MinTarif($c,$m, $n)
    {
        
        $X = array();
          
      
       
        for ($i=0; $i < count($m); $i++) { 
            for ($j=0; $j < count($n); $j++) { 
                $X[$i][$j]=-1;
            }
        }
        
        $k=0;
        $t=0; 
                
     
                    for ($i=0; $i < count($c); $i++)
                        {
                            for ($j=0; $j < count($c[0]); $j++)
                                {
 
                                    $k = getIndexi($c);
                                    $t = getIndexj($c);
 
                                        $minPost = min($m[$k],$n[$t]); // Минимальная поставка в строке или столбце
    
                                        $X[$k][$t] = $minPost; // Загружаем поставку
                                                            
 
                                           if($minPost == $m[$k]) { $n[$t] -= $m[$k]; $m[$k]=0; $c = ZamenaStroki($c,$k); }
 
                                        if($minPost == $n[$t]) { $m[$k] -= $n[$t]; $n[$t]=0; $c = ZamenaStolbca($c,$t); }
                              }
                  
                        }
 
        return $X;
 
    }

function getMin($arr)
    {
        $min = array ("value"=>$arr[0][0], "col"=>0, "row"=>0);
        
        
        for ($i=0; $i < count($arr); $i++)
            {
                for ($j=0; $j < count($arr[0]); $j++)
                    {
                        if($arr[$i][$j]==0) continue;
 
                        if($min["value"]>$arr[$i][$j] || $min["value"] == 0 && $arr[$i][$j] != 0) {
                            $min["value"] = $arr[$i][$j];
                            $min["col"]   = $j;
                            $min["row"]   = $i;
                        }
                    }
            }
        return $min;
    }
 
var_export(MinElem($ab));

/*function getMin($arr)
     {
         static $res = array();
 
         foreach ($arr as $k => $v) {
             if(is_array($v))
                 getMin($v);
             else{
                 if($v != 0)
                     $res[] = $v;
             }
         }
         return !empty($res) ? min($res) : 0;
     }
       
 */
    function getIndexi($ab)
    {
        $k=0;
        for ($i=0; $i < count($ab); $i++) { 
            for ($j=0; $j < count($ab[0]); $j++) { 
                if($ab[$i][$j] == getMin($ab))
                    $k = $i;
            }
        }
        return $k;
    }
 
    function getIndexj($ab)
    {
        $t=0;
        for ($i=0; $i < count($ab); $i++) { 
            for ($j=0; $j < count($ab[0]); $j++) { 
                if($ab[$i][$j] == getMin($ab))
                    $t = $j;
            }
        }
        return $t;
    }


function ZamenaStroki($c, $stroka)
    {
        for ($i=0; $i < count($c[0]); $i++) { 
                $c[$stroka][$i] = 0;
        }
        
        return $c;
    }
 
 
    function ZamenaStolbca($c,$stolbec)
    {
        for ($i=0; $i < count($c); $i++) 
        {
            $c[$i][$stolbec] = 0;
        }
        return $c;
    }