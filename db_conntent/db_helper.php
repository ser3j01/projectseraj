<?php
class DbHelper {
    private $conn;

    function createDbConnection() {
        try {
            $this->conn = new mysqli("localhost", "root", "", "seraj");
            if ($this->conn->connect_error) {
                die("Database connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    function insertNewStudent($name, $email) {
        try {
            $sql = "INSERT INTO students (name, email) VALUES ('$name', '$email')";
            $result = $this->conn->query($sql);
            if ($result === true) {
                echo json_encode(array(
                    "success" => true,
                    "message" => "New user has been added"
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "New user has not been added"
                ));
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    function getAllStudents() {
        try {
            $sql = "SELECT * FROM students";
            $result = $this->conn->query($sql);
            $students = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $students[] = $row;
                }
            }

            echo json_encode($students);
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    function getStudentById($id) {
        try {
            $sql = "SELECT * FROM students WHERE id = '$id'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();
                echo json_encode($student);
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Student not found"
                ));
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    function deleteStudent($id) {
        try {
            $sql = "DELETE FROM students WHERE id = '$id'";
            $result = $this->conn->query($sql);

            if ($result === true) {
                echo json_encode(array(
                    "success" => true,
                    "message" => "Student deleted successfully"
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Failed to delete student"
                ));
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    function updateStudent($id, $name, $email) {
        try {
            $sql = "UPDATE students SET name = '$name', email = '$email' WHERE id = '$id'";
            $result = $this->conn->query($sql);

            if ($result === true) {
                echo json_encode(array(
                    "success" => true,
                    "message" => "Student updated successfully"
                ));
            } else {
                echo json_encode(array(
                    "success" => false,
                    "message" => "Failed to update student"
                ));
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
?>
