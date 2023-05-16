<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jaspersoft\Client\Client;

class relatoriosController extends Controller
{
    public function index(){
        return view('index');
    }

    public function getId(){
        return view('relatorio');
    }

    public function executarJasper(Request $request){
        $getId = $request->input('get-id');
        // $getId2 = $request->input('get-id2');
        $controls = array('ID' => $getId);
        
        $jasperCliente = new Client(
            "http://localhost:8080/jasperserver",
            "jasperadmin",
            "jasperadmin"
        );
        $report = $jasperCliente->reportService()->runReport('/reports/relatorios_ex/main', 'pdf', null, null, $controls);
        // $reportContent = $report->output();
        
        
        // Define o tipo de conteúdo do arquivo como PDF.
        header('Content-Type: application/pdf');

        // Define o nome do arquivo que será exibido no navegador.
        header('Content-Disposition: inline; filename="arquivo.pdf"');
        
        // Define o tamanho do conteúdo do arquivo.
        header('Content-Length: ' . strlen($report));

        // Define as configurações de cache do navegador.
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        
        // Define as informações de última modificação e aceitação de partes do arquivo, respectivamente.
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Accept-Ranges: none');

        // Limpa qualquer saída de buffer que possa interferir no envio do arquivo.
        ob_clean();
        flush();
        
        echo $report;
        exit;
    }
}
