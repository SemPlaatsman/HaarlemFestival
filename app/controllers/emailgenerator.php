<?php
require_once "../vendor/autoload.php"; 
require_once __DIR__ . '/../services/reservationservice.php';
require_once __DIR__ . '/../services/ticketdanceservice.php';
require_once __DIR__ . '/../services/tickethistoryservice.php';
require_once __DIR__ . '/../services/orderservice.php';
require_once "../lib/phpqrcode/qrlib.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Fpdf\Fpdf;
define('EURO',chr(128));

class EmailGenerator {

    private $orderService;
    private $reservationService;
    private $ticketDanceService;    
    private $ticketHistoryService;

    function __construct() {
        $this->reservationService = new ReservationService();
        $this->ticketDanceService = new TicketDanceService();
        $this->ticketHistoryService = new TicketHistoryService();
        $this->orderService = new OrderService();
    }


    function generate(string $body, string $subject, string $email, string $recipient){
        $mail = new PHPMailer();
        $mail->isSMTP();                                             
        $mail->Host       = 'smtp-relay.sendinblue.com';                        
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'janjaapvanlaar@gmail.com';                   
        $mail->Password   = 'V5JKvcpqUnz0GX6W';                     
        $mail->SMTPSecure = 'tls';                                  
        $mail->Port       = 587;                                    
        $mail->setFrom('Haarlem@festival.nl', 'Haarlem festival');
        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email, $recipient);
        return $mail;
    }

    function sentEmail(string $body, string $subject, string $email, string $recipient){
        $mail = $this->generate($body, $subject, $email, $recipient);
        $mail->Send();
    }

    function sentEmailWithTickets(string $email, string $recipient, int $orderId){
        $invoice = $this->makeInvoicePdf($orderId);
        $tickets = $this->makeTicketsPdf($orderId);
        ob_start();
        require_once __DIR__ . '/../views/email/tickets.php';
        $body = ob_get_clean();
        $subject = "yours tickets";
        $mail = $this->generate($body, $subject, $email, $recipient);
        $mail->addStringAttachment($invoice->Output("S",'invoice.pdf'), 'invoice.pdf', $encoding = 'base64', $type = 'application/pdf');
        $mail->addStringAttachment($tickets->Output("S",'tickets.pdf'), 'tickets.pdf', $encoding = 'base64', $type = 'application/pdf');
        $mail->Send();
    }

    //naar view
    function makeInvoicePdf(int $orderId)
    {
        $reservations = $this->reservationService->getReservationsForOrder($orderId);
        $ticketsDance = $this->ticketDanceService->getAllTicketsDance($orderId);
        $ticketsHistory = $this->ticketHistoryService->getTicketHistoryForOrder($orderId);
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',24);
        $pdf->Cell(40,10, "Invoice");
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10, "Reservations:");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 11);
        //print reservations
        foreach($reservations as $reservation){
            $current_y = $pdf->GetY();
            $current_x = $pdf->GetX();
            $pdf->MultiCell(40,5, "Restaurant: \n" .$reservation->getRestaurant()->getName(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Date: \n" . $reservation->getDatetimeFormatted(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Nr of adults: \n" . $reservation->getNrOfAdults(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(80,5, "Nr of kids: \n" . $reservation->getNrOfKids(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Price: \n". EURO . $reservation->getTotalPrice(), 0);
            $pdf->Ln(10);
        }
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10, "Tickets DANCE!:");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 11);
        //print dance tickets
        foreach($ticketsDance as $ticket){
            $current_y = $pdf->GetY();
            $current_x = $pdf->GetX();
            $pdf->MultiCell(40,5, "Nr of people: \n" . $ticket->getNrOfPeople(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Venue: \n" . $ticket->getPerformance()->getVenue()->getName(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Start: \n" . $ticket->getPerformance()->getStartDateFormatted(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "End: \n" . $ticket->getPerformance()->getEndDateFormatted(), 0);
            
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Price: \n". EURO . $ticket->getTotalPrice(), 0);
            $pdf->Ln(10);
        }
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10, "Tickets A Stroll Through History:");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 11);
        //print history tickets
        foreach($ticketsHistory as $ticket){
            $current_y = $pdf->GetY();
            $current_x = $pdf->GetX();
            $pdf->MultiCell(40,5, "Nr of people: \n" . $ticket->getNrOfPeople(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Language: \n" . $ticket->getTour()->getLanguage(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(50,5, "Start: \n" . $ticket->getTour()->getDatetimeFormatted(), 0);
            $current_x= $current_x + 80;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Price: \n". EURO . $ticket->getTotalPrice(), 0);
            $pdf->Ln(10);
        }
        $current_y = $pdf->GetY();
        $current_x = $pdf->GetX() +160;
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell(40,5, "Total: \n". EURO . $this->orderService->getOrderPrice(1), 0);
        
        return $pdf;
    }

    function makeTicketsPdf(int $orderId)
    {
        $reservations = $this->reservationService->getReservationsForOrder($orderId);
        $ticketsDance = $this->ticketDanceService->getAllTicketsDance($orderId);
        $ticketsHistory = $this->ticketHistoryService->getTicketHistoryForOrder($orderId);
        $qrCodeCounter = 0;
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',24);
        $pdf->Cell(40,10, "Tickets");
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10, "Reservations:");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 11);
        //print reservations
        foreach($reservations as $reservation){
            $current_y = $pdf->GetY();
            $current_x = $pdf->GetX();
            $pdf->MultiCell(40,5, "Restaurant: \n" .$reservation->getRestaurant()->getName(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Date: \n" . $reservation->getDatetimeFormatted(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Nr of adults: \n" . $reservation->getNrOfAdults(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(80,5, "Nr of kids: \n" . $reservation->getNrOfKids(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            QRcode::png($reservation->getQRCode(), '../qrcodes/qrcode'.$qrCodeCounter.'.png', QR_ECLEVEL_L, 5);
            
            $pdf->MultiCell(0,0, $pdf->Image('../qrcodes/qrcode'.$qrCodeCounter.'.png', $pdf->GetX(), $pdf->GetY(), 20), 0,);
            $qrCodeCounter++;
            $pdf->Ln(25);
        }
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10, "Tickets DANCE!:");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 11);
        //print dance tickets
        foreach($ticketsDance as $ticket){
            $current_y = $pdf->GetY();
            $current_x = $pdf->GetX();
            $pdf->MultiCell(40,5, "Nr of people: \n" . $ticket->getNrOfPeople(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Venue: \n" . $ticket->getPerformance()->getVenue()->getName(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Start: \n" . $ticket->getPerformance()->getStartDateFormatted(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "End: \n" . $ticket->getPerformance()->getEndDateFormatted(), 0);
            
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            QRcode::png($ticket->getQRCode(), '../qrcodes/qrcode'.$qrCodeCounter.'.png', QR_ECLEVEL_L, 5);
            $pdf->MultiCell(0,0, $pdf->Image('../qrcodes/qrcode'.$qrCodeCounter.'.png', $pdf->GetX(), $pdf->GetY(), 20), 0,);
            $qrCodeCounter++;
            $pdf->Ln(25);
        }
        $pdf->Ln(20);
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10, "Tickets A Stroll Through History:");
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 11);
        //print history tickets
        foreach($ticketsHistory as $ticket){
            $current_y = $pdf->GetY();
            $current_x = $pdf->GetX();
            $pdf->MultiCell(40,5, "Nr of people: \n" . $ticket->getNrOfPeople(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(40,5, "Language: \n" . $ticket->getTour()->getLanguage(), 0);
            $current_x= $current_x + 40;
            $pdf->SetXY($current_x, $current_y);
            $pdf->MultiCell(50,5, "Start: \n" . $ticket->getTour()->getDatetimeFormatted(), 0);
            $current_x= $current_x + 80;
            $pdf->SetXY($current_x, $current_y);
            QRcode::png($ticket->getQRCode(), '../qrcodes/qrcode'.$qrCodeCounter.'.png', QR_ECLEVEL_L, 5);
            $pdf->MultiCell(0,0, $pdf->Image('../qrcodes/qrcode'.$qrCodeCounter.'.png', $pdf->GetX(), $pdf->GetY(), 20), 0,);
            $qrCodeCounter++;
            $pdf->Ln(25);
        }      
        return $pdf;
    }
}
