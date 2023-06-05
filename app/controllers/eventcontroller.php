<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/eventservice.php';

class EventController extends Controller
{
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index()
    {
        try {
            $event = $this->eventService->getEvent();
            $data = [
                'event' => $event,
            ];
            $this->displayView($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function insertEvent()
    {
        try {
            $name = htmlspecialchars($_POST['name']);

            $dateStrStart = htmlspecialchars($_POST['start_date']);
            $dateStart = DateTime::createFromFormat('Y-m-d', $dateStrStart);

            $dateStrEnd = htmlspecialchars($_POST['end_date']);
            $dateEnd = DateTime::createFromFormat('Y-m-d', $dateStrEnd);

            $result = $this->eventService->insertEvent($name, $dateStart, $dateEnd);

            if ($result) {
                // return success response
                $_SESSION['success_message'] = 'The event: ' . $name . ' has been successfully inserted.';
                header("Location: /event");
            } else {
                // return failed response
                echo 'Something went wrong with the insert';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function updateEvent()
    {
        try {
            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name']);

            $dateStrStart = htmlspecialchars($_POST['start_date']);
            $dateStart = DateTime::createFromFormat('Y-m-d', $dateStrStart);

            $dateStrEnd = htmlspecialchars($_POST['end_date']);
            $dateEnd = DateTime::createFromFormat('Y-m-d', $dateStrEnd);

            $result = $this->eventService->updateEvent($id, $name, $dateStart, $dateEnd);

            if ($result) {
                // return succes response
                $_SESSION['success_message'] = 'The event with id: ' . $id . ' has been successfully changed.';
                header("Location: /event");
            } else {
                // return failed response
                echo 'Something went wrong with the update';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteEvent()
    {
        try {
            $id = $_POST['id'];
            $result = $this->eventService->deleteEvent($id);
            if ($result) {
                // return success response
                $_SESSION['success_message'] = 'The event with id: ' . $id . ' has been successfully deleted.';
                header("Location: /event");
            } else {
                // return failed response
                echo 'Something went wrong with the deletion';
            }
        } catch (Exception $e) {
            // Handle the exception here
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>