<?php
class Tools extends CI_Controller {

        // public function index($to = 'World')
        // {
        //         echo "Hello {$to}!".PHP_EOL;
        // }

        public function index()
        {$this->load->helper('url');
            $this->load->helper('file');
            $this->load->helper('download');
            $this->load->library('zip');
            $this->load->dbutil();

            
            $db_format=array('format'=>'zip','filename'=>'my_db_backup.sql');
            $backup=& $this->dbutil->backup($db_format);
            $dbname='backup-on-'.date('Y-m-d').'.zip';
            $save='assets/db_backup/'.$dbname;
            write_file($save,$backup);
            force_download($dbname,$backup);
                // Load the DB utility class
            //     $this->load->dbutil();
            //     $this->load->model('user');
            //     // Backup your entire database and assign it to a variable
            //     $backup = $this->dbutil->backup();

            //     // Load the file helper and write the file to your server
            //     $this->load->helper('file');
            //     write_file('/path/to/mybackup.gz', $backup);

            //     // Load the download helper and send the file to your desktop
            //     $this->load->helper('download');
            //     force_download('mybackup.txt', $backup);

            //     $prefs = array(
            //         'tables'        => array('user'),   // Array of tables to backup.
            //         'ignore'        => array(),                     // List of tables to omit from the backup
            //         'format'        => 'txt',                       // gzip, zip, txt
            //         'filename'      => 'mybackup.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            //         'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
            //         'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
            //         'newline'       => "\n"                         // Newline character used in backup file
            // );
            
            // $this->dbutil->backup($prefs);

        }
    }