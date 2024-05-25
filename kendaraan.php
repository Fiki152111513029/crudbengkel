<?php

require_once 'db.php';

class kendaraan extends db {

    function show(){
        $data = $this->db->prepare("SELECT * FROM kendaraan k
                                    JOIN tipe_kendaraan t ON k.id_tipe = t.id_tipe
                                    JOIN pemilik p ON k.id_pemilik = p.id_pemilik
                                    ORDER BY k.tahun");

        try {
            $data->execute();
            $result = $data->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

        return $result;
    }

    function store($no_STNK, $id_tipe, $id_pemilik, $no_mesin, $no_rangka, $tahun, $warna){
        $data = $this->db->prepare("INSERT INTO kendaraan (No_stnk,ID_tipe,ID_pemilik,No_mesin,No_rangka,Tahun,Warna) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $data->bindParam(1, $no_STNK);
        $data->bindParam(2, $id_tipe);
        $data->bindParam(3, $id_pemilik);
        $data->bindParam(4, $no_mesin);
        $data->bindParam(5, $no_rangka);
        $data->bindParam(6, $tahun);
        $data->bindParam(7, $warna);

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
        
        return $result;
    }
    
    function update($no_STNK, $id_tipe, $id_pemilik, $no_mesin, $no_rangka, $tahun, $warna){
        $data = $this->db->prepare("UPDATE pemilik 
                                    SET nama_pemilik = '$id_tipe', 
                                        alamat_pemilik = '$id_pemilik', 
                                        telp_pemilik = '$no_mesin',
                                        No_rangka = '$no_rangka',
                                        Tahun = '$tahun',
                                        Warna = '$warna'
                                    WHERE No_stnk = '$no_STNK'");
        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
    
    function delete($no_STNK){
        $data = $this->db->prepare("DELETE FROM kendaraan
                                    WHERE No_stnk = '$no_STNK'");

        try {
            $result = $data->execute();
        } catch (PDOExeption $e) {
            print_r($e->getMessage());
        }
            
        return $result;
    }
}

?>