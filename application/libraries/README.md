Encrypt data with aes 128 and 256 byte
And decrypt it in Codeigniter

Example :
$this->load->library('aes',128);

$enc = $this->aes->encrypt('data','password');

echo $enc;

echo $this->aes->descrypt($enc,'password');
