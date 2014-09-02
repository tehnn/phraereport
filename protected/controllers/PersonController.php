<?php

class PersonController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionPerson1($isPdf = FALSE) {

        ini_set('memory_limit', '30M');
        ini_set('max_execution_time', '60');


        if (!isset($_POST[data])) {
            $sql = "select h.hoscode,h.hosname2 from chospital h where h.provcode=54";
        } else {
            $sql = "select h.hoscode,h.hosname2 from chospital h where h.provcode=54 and h.hostype in (03)";
        }

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        if ($isPdf) {

            $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            spl_autoload_register(array('YiiBase', 'autoload'));
            //เพิ่ม  font
            //$fontname = $pdf->addTTFfont('pdffont/FONTNONGNAM.TTF', 'TrueTypeUnicode', '', 32);


            // set document information

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetTitle("สสจ.แพร่");
            $pdf->SetHeaderData('', 0, "สำนักงานสาธารณสุขจังหวัดแพร่", "เวลาพิมพ์ " . date('Y-m-d H:i:s') . "");
            $pdf->setHeaderFont(Array('freeserif', '', '14'));
            $pdf->setFooterFont(Array('freeserif', '', '10'));
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetFont('freeserif', '', 12);
            //เรียกใช้ font ที่เพิ่ม
            //$pdf->SetFont($fontname, '', 14, '', false);
            $pdf->SetTextColor(80, 80, 80);
            $pdf->AddPage();

            //$sql = "select * from  disease";

            $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

            $tbl = '<table cellspacing="0" cellpadding="4" border="1">';
            $tbl.= "<tr><th>รหัส</th><th>ชื่อ</th></tr>";

            foreach ($dataReader as $key => $value) {
                $col1 = $value['hoscode'];
                $col2 = $value['hosname2'];
                $tbl.="<tr bgcolor='#FF0000'><td>$col1</td><td>$col2</td></tr>";
            }

            $tbl.='</table>';

            $pdf->writeHTML($tbl, true, false, true, false, '');

            // reset pointer to the last page
            $pdf->lastPage();

            //Close and output PDF document
           
                $pdf->Output('filename.pdf', 'I'); // I= Preview , D=Download
            
                //$pdf->Output('filename.pdf', 'D'); // I= Preview , D=Download  
            
            Yii::app()->end();
        }

        $this->render('person1', array(
            'model' => $dataReader,
        ));
    }

}

