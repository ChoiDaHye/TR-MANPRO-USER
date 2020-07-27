<?php
    class mydata{
        public function vcd_tampil(){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/vcd.json");
            $json = json_decode($jsonData, true);
            $output = array();

            foreach ($json['vcd'] as $data) {
                $sedia = $data['kondisi_baik'] - $data['kondisi_buruk'] - $data['terpinjam'];
                array_push($output, array($data['id_vcd'], $data['poster'], $data['judul'], $sedia));
            }

            if($output != null){
                return $output;
            } else{
                return false;
            }
        }

        public function vcd_detail($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/vcd.json");
            $json = json_decode($jsonData, true);
            $output = array();

            foreach ($json['vcd'] as $data) {
                if($data['id_vcd'] == $id){
                    $sedia = $data['kondisi_baik'] - $data['kondisi_buruk'] - $data['terpinjam'];
                    array_push($output, $data['poster'], $data['judul'], $data['rilis'], $data['genre'], $data['bahasa'], $sedia);
                }
            }

            if($output != null){
                return $output;
            } else{
                return 0;
            }
        }

        public function login($u, $p){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/customer.json");
            $json = json_decode($jsonData, true);
            $id = "";

            foreach ($json['customer'] as $data) {
                if($data['username'] == $u && $data['password'] == $p){
                    $id = $data['idCustomer'];
                }
            }

            if($id != ""){
                session_start();
                $_SESSION['idCustomer'] = $id;
                header("Location: ./dashboard/dashboard.php");
            } else{
                return false;
            }
        }

        public function logout(){
            session_unset();
            session_destroy();
        }

        public function profile_tampil($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/customer.json");
            $json = json_decode($jsonData, true);
            $output = array();

            foreach ($json['customer'] as $data) {
                if($data['idCustomer'] == $id){
                    array_push($output, $data['nama'], $data['noKtp'], $data['kontak'], $data['alamat']);
                }
            }

            if($output != null){
                return $output;
            } else{
                return 0;
            }
        }

        public function profile_edit($id, $data){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/customer.json");
            $json = json_decode($jsonData, true);

            $newDate = date("d/m/Y");
            foreach ($json['customer'] as $i => $dataku) {
                if($dataku['idCustomer'] == $id){
                    $json['customer'][$i]['nama'] = $data['nama'];
                    $json['customer'][$i]['kontak'] = $data['kontak'];
                    $json['customer'][$i]['alamat'] = $data['alamat'];
                    $json['customer'][$i]['editedAt'] = $newDate;
                }
            }

            if(file_put_contents("C:/Users/dgeda/Documents/vcd-data/tes/customer.json", json_encode($json, JSON_UNESCAPED_SLASHES))){
                return true;
            } else{
                return false;
            }
        }

        public function profile_pass($id, $old, $new){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/customer.json");
            $json = json_decode($jsonData, true);
            $cp = 0;

            $newDate = date("d/m/Y");
            foreach ($json['customer'] as $i => $dataku) {
                if($dataku['idCustomer'] == $id && $dataku['password'] == md5($old)){
                    $json['customer'][$i]['password'] = md5($new);
                    $json['customer'][$i]['editedAt'] = $newDate;
                    $cp = 1;
                }
            }

            if($cp == 1 && file_put_contents("C:/Users/dgeda/Documents/vcd-data/tes/customer.json", json_encode($json, JSON_UNESCAPED_SLASHES))){
                return true;
            } else{
                return false;
            }
        }

        public function trans_jalan($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/pinjam.json");
            $json = json_decode($jsonData, true);
            $output = array();
            $i = 1;

            foreach ($json['pinjam'] as $data) {
                if($data['id_customer'] == $id && $data['status'] == "Berjalan"){
                    $jth_tmp = DateTime::createFromFormat('d/m/Y', $data['jatuh_tempo'])->format('Y-m-d');
                    $newDate = date("Y-m-d");
                    $diff = strtotime($jth_tmp) - strtotime($newDate);
                    $diff2 = round($diff / (60 * 60 * 24));
                    $status = "";
                    $w = 0;

                    if($diff2 > 0 && $diff2 <= 3){
                        $status = "Tinggal ".$diff2." hari";
                        $w = 1;
                    } else if($diff2 == 0){
                        $status = "Jatuh tempo";
                        $w = 2;
                    } else if($diff2 < 0){
                        $status = "Terlambat ".($diff2 * -1)." hari";
                        $w = 2;
                    } else if($diff2 > 0 && $diff2 > 3){
                        $status = "Berjalan";
                        $w = 0;
                    }

                    array_push($output, array($i, $data['id_pinjam'], $data['tgl_pinjam'], $data['jatuh_tempo'], $data['harga_total'], $status, $w));
                    $i++;
                }
            }

            if($output != null){
                return $output;
            } else{
                return false;
            }
        }

        public function trans_jalan_det($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/pinjam_det.json");
            $json = json_decode($jsonData, true);
            $output = array();

            foreach ($json['pinjam_det'] as $data) {
                if($data['id_pinjam'] == $id){
                    $judul = $this->get_judul($data['id_vcd']);
                    array_push($output, array($judul, $data['jumlah'], $data['subtotal'], $data['kembali']));
                }
            }

            if($output != null){
                return $output;
            } else{
                return false;
            }
        }

        public function trans_selesai($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/pinjam.json");
            $jsonData2 = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/kembali.json");
            $json = json_decode($jsonData, true);
            $json2 = json_decode($jsonData2, true);
            $output = array();
            $i = 1;

            foreach ($json['pinjam'] as $data) {
                if($data['id_customer'] == $id && $data['status'] == "Selesai"){
                    foreach ($json2['kembali'] as $data2) {
                        if($data2['id_pinjam'] == $data['id_pinjam']){
                            $cp = 0;
                            foreach ($output as $i => $data3) {
                                if($data3[1] == $data['id_pinjam']){
                                    $output[$i][3] = $data3[3] + $data2['denda_total'];
                                    $cp = 1;
                                }
                            }

                            if($cp == 0){
                                array_push($output, array($i, $data['id_pinjam'], $data['harga_total'], $data2['denda_total']));
                            }                            

                            $i++;
                        }
                    }
                }
            }

            if($output != null){
                return $output;
            } else{
                return false;
            }
        }

        public function trans_selesai_det($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/kembali.json");
            $jsonData2 = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/kembali_det.json");
            $json = json_decode($jsonData, true);
            $json2 = json_decode($jsonData2, true);
            $output = array();
            $pinjam = array();
            $kembali = array();

            foreach ($json['kembali'] as $data) {
                if($data['id_pinjam'] == $id){
                    foreach ($json2['kembali_det'] as $data2) {
                        if($data2['id_kembali'] == $data['id_kembali']){
                            $cp3 = 0;
                            foreach($kembali as $data3){
                                
                            }

                            if($cp3 == 0){
                                array_push($kembali, array());
                            }
                        }
                    }
                }
            }

            if($output != null){
                return $output;
            } else{
                return false;
            }
        }

        public function get_judul($id){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/vcd.json");
            $json = json_decode($jsonData, true);
            $judul = "";

            foreach ($json['vcd'] as $data) {
                if($data['id_vcd'] == $id){
                    $judul = $data['judul'];
                }
            }

            return $judul;
        }

        public function url_exists($url){
            $file = $url;
            $file_headers = @get_headers($file);

            if(!$file_headers || strpos($file_headers[0], '404') != null){
                return false;
            } else{
                return true;
            }
        }

        public function vcd_cari($judul){
            $jsonData = file_get_contents("C:/Users/dgeda/Documents/vcd-data/tes/vcd.json");
            $json = json_decode($jsonData, true);
            $output = array();

            foreach ($json['vcd'] as $data) {
                if($data['judul'] == $judul){
                    $sedia = $data['kondisi_baik'] - $data['kondisi_buruk'] - $data['terpinjam'];
                    array_push($output, array($data['id_vcd'], $data['poster'], $data['judul'], $sedia));
                }
            }

            if($output != null){
                return $output;
            } else{
                return false;
            }
        }
    }
?>
