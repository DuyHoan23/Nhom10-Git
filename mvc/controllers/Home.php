<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{
    // Must have SayHi()
    function SayHi(){
        $nhanVienmodel = $this->model("NhanVienModel");
    }

    function Show(){        
        // Call Models
         $nhanVienmodel = $this->model("NhanVienModel");
       // $tong = $nhanVienmodel->Tong($a, $b); // 3
        // $this->nhanVienmodel->GetSV();
        // Call Views
        $this->view("frmThongTinNV", [
           // "Page"=>"news",
           // "Number"=>$tong,
            // "Mau"=>"red",
            // "SoThich"=>["A", "B", "C"],
            // "nhanVien"=>$nhanVienmodel->GetSV()
            //"SV" => $nhanVienmodel->SinhVien()
        ]);
    }

    function tranngoc(){
        $tranngoc = 123;
        return $tranngoc;
        echo"test fetch";
    }
}
?>
