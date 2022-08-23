<?php
require_once "inc/koneksi.php";

   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }

   function get_tb_pelanggan()
   {
      global $koneksi;      
      $query = $koneksi->query("SELECT * FROM tb_pelanggan");            
      while($row=mysqli_fetch_object($query))
      {
         $data[] =$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }     

   function get_tb_pelanggan_id()
   {
      global $koneksi;
      if (!empty($_GET["id_pelanggan"])) {
         $id = $_GET["id_pelanggan"];      
      }            
      $query ="SELECT * FROM tb_pelanggan WHERE id_pelanggan= $id";      
      $result = $koneksi->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }

   function insert_tb_pelanggan()
   {
      global $koneksi;   
      $check = array('id_pelanggan' => ' ', 'nama' => ' ', 'alamat' => ' ', 'no_hp' => ' ', 'terdaftar_mulai' => '', 'email' => ' ', 'password' => ' ', 'level' => ' ', 'id_paket' => ' ');
      $check_match = count(array_intersect_key($_POST, $check));
      if($check_match == count($check)){
      
            $result = mysqli_query($koneksi, "INSERT INTO tb_pelanggan SET
            id_pelanggan    = '$_POST[id_pelanggan]',
            nama            = '$_POST[nama]',
            alamat          = '$_POST[alamat]',
            no_hp           = '$_POST[no_hp]',
            terdaftar_mulai = '$_POST[terdaftar_mulai]',
            email           = '$_POST[email]',
            password        = '$_POST[password]',
            level           = '$_POST[level]',
            id_paket        = '$_POST[id_paket]'");
            
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Insert Success'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Insert Failed.'
               );
            }
      }else{
         $response=array(
                  'status' => 0,
                  'message' =>'Wrong Parameter'
               );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function update_tb_pelanggan()
   {
      global $koneksi;
      if (!empty($_GET["id_pelanggan"])) {
      $id = $_GET["id_pelanggan"];      
   }   
      $check = array('nama' => ' ', 'alamat' => ' ', 'no_hp' => ' ', 'terdaftar_mulai' => ' ', 'email' => ' ', 'password' => ' ', 'level' => ' ', 'id_paket' => ' ');
      $check_match = count(array_intersect_key($_POST, $check));         
      if($check_match == count($check)){
      
           $result = mysqli_query($koneksi, "UPDATE tb_pelanggan SET               
            nama            = '$_POST[nama]',
            alamat          = '$_POST[alamat]',
            no_hp           = '$_POST[no_hp]',
            terdaftar_mulai = '$_POST[terdaftar_mulai]',
            email           = '$_POST[email]',
            password        = '$_POST[password]',
            level           = '$_POST[level]',
            id_paket        = '$_POST[id_paket]' WHERE id_pelanggan = $id");
      
         if($result)
         {
            $response=array(
               'status' => 1,
               'message' =>'Update Success'                  
            );
         }
         else
         {
            $response=array(
               'status' => 0,
               'message' =>'Update Failed'                  
            );
         }
      }else{
         $response=array(
                  'status' => 0,
                  'message' =>'Wrong Parameter',
                  'data'=> $id
               );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }

   function delete_tb_pelanggan()
   {
      global $koneksi;
      $id = $_GET['id_pelanggan'];
      $query = "DELETE FROM tb_pelanggan WHERE id_pelanggan=".$id;
      if(mysqli_query($koneksi, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Delete Success'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Delete Fail.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 ?>