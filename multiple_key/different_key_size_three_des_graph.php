<?php // content="text/plain; charset=utf-8"
	//echo 'Fist post variable is '.$_POST['time1'].$_POST['time2'];
	
/*	for($i=0;$i<10;$i++)
  	{  
	    $three_des_time='time'.($i+1);
	    $_POST[$three_des_time]=5.045+$i;
	}
*/	
		//header('Location:graph.php');
		$three_des_time=array();
		$key_size=array();
		for ($i=0; $i < 5; $i++) 
		{ 
			$three_des_time_par_name='three_des_time'.($i+1);
			$key_size_par_name='key_size'.($i+1);
			$three_des_time[$i]=$_POST[$three_des_time_par_name];
			$key_size[$i]=$_POST[$key_size_par_name];
		}
	  	//$three_des_time1=$_POST['time1'];
		require_once ('src/jpgraph.php');
		require_once ('src/jpgraph_scatter.php');
		 
		// Make a circle with a scatterplot
		//$steps=5;
		//$datax=array();
		$datax=array($key_size[0],$key_size[1],$key_size[2],$key_size[3],$key_size[4]);
		$datay=array($three_des_time[0],$three_des_time[1],$three_des_time[2],$three_des_time[3],$three_des_time[4]);
		
		/*for($i=0;$i<10;$i++)
		{
			$k='time'.($i+1);
			$datax[$i]=$_POST[$k];	
		}	
		foreach ($datax as $value) 
		{
			echo $value.'<br>';
		}*/
		   
		
		 
		$graph = new Graph(900,600);
		$graph->SetScale('linlin');
		$graph->SetShadow();
		$graph->SetAxisStyle(AXSTYLE_BOXIN);
		 
		$graph->img->SetMargin(50,50,60,40);
		 
		$graph->title->Set('X= Key size[in bytes], Y= Execution time [in s]');
		$graph->title->SetFont(FF_FONT1,FS_BOLD);
		$graph->subtitle->Set('(THREE DES Graph By : Gaurav Parmar)');
		$graph->subtitle->SetFont(FF_FONT1,FS_NORMAL);
		 
		// 10% top and bottom grace
		$graph->yscale->SetGrace(5,5);
		$graph->xscale->SetGrace(1,1);
		 
		$sp1 = new ScatterPlot($datay,$datax);
		$sp1->mark->SetType(MARK_FILLEDCIRCLE);
		$sp1->mark->SetFillColor('blue');
		$sp1->SetColor('blue');
		 
		$sp1->mark->SetWidth(4);
		$sp1->link->Show();
		$sp1->link->SetWeight(2);
		$sp1->link->SetColor('blue@0.7');
		 
		 
		$graph->Add($sp1);
		$graph->Stroke();
 	
	//echo '<img src="'.$a.'">; 	
	//echo $a;
?>