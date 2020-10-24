<?php
$privPem = '-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC9PgKWaAtMeDgo
arFyv6F2JGCZ/nKtbieS7SiXTKzwTTlLVwTN9qmEuxlI+ZMWV/DVZ1GH9AYdtGSe
2ZQTSQ1GteXzvMjOnPy+RXoZXdRlbENEg8bcpuOkCgpEV2N5GZOKtp0bK04yFRHY
KYEgmp3stfugmtghq4609BrGoOvSfe/hMG8Kxm9Vr5NwikdL62mh165hslbrzGbj
CD3FmhNJUrRDlbi9blseYf9QHPRXRPjKRvtAyZLNvsOfwGvZrWS66JsCqmWOEHAW
SOXMBG5NPX0Dymic9FcwsoYGpAZe/Yw7Mm80UcmT7x59BbeGefLzYXQLwHsHIO3K
PsIzhQlLAgMBAAECggEASkMpVMijlnCe6Q1lcThOLkR8PDIj4ncVxIyYnzcRroM/
dpdBZWnkgBfEBmUaGWyNL9GJpyZVuBZwXf3YI/FI6nS7Nnjg/GOSs0AkeAvgK6Te
iOaFhVVgg6EFAmiguocU5RxgbqcB2pl2FTPEXn0OeDO5+P6Kzju6lrwsPcIsiL8B
rYRBZ0fqbJtbsGvTaqYY6bLoOi94HehoDysXx+OZFZFtW8FXNUEnyLupHrEqFfWh
Nr6cM0BhSnUXsahkPD5ffgOIm5at21eG/QftDgDbxVrhCkVqbH6o3Q7+VqBzdrFY
QYg7EDgAXsOrDQ43+jUrllbJaFSG2JB3l1KXaC9wQQKBgQDu4E0j4b0GsqFHcO32
DWWIQLmZQBUtRbi3ZbUrIvGUiMfLzSM2Z9hb3Q4pDd8s+ja1uFskfreOqRhkkzxq
h8TtSCdC//3RJsm8R1UQCybqOr2/mbN4TjfabiSbbsyp1QTML+BVHWxO1rKus95M
bz3v6gn36jIEkW5c8uW0Mk1j+wKBgQDKztvwNEWTCUlr367BBjUY3ZsB6LME2Dh0
0v+CK+RPR37VniMqS09Fz6MX1T2r5htZlR5G5w3Zl0cWxkdOVq4UEAAMbXgROlRb
K+ABabAgm8yzgjGmDP0OXyJRgKkDoyXF7acQeCM1grmzfIjRrHSDcxIWWVwklhM9
Ft+MJ8+e8QKBgFa90IU1FaT2/KWqll6A4tulVUAXCxmTdc3y+uSdHchoGtUguqao
8uH41YmG5gG5ImC+fyozcYg2UwtCg+/TOWlIiClGN+7Y/OyHopXe1tS7W+fVclw/
WvzQfi6K/3q0Rbe3suh1dLz0LZJO8mwjAQS7ob8KpfsOrFrIQS08Duo9AoGBALUO
b/PF9scJ525Sx6Szcfu8+4F8yTVuAxjotgr0PGM6pNT41NQRX7gnYqcITIKGb6xO
IDWUWR0EnQaMBWS+pbJrhl+R6zsWI/Ew/k7El+TEsr8fYEuqFNEbxXuVrU39/N7z
B88AMg63oinG6C6oE2y28lLZfBV9lbdYEEMD16tBAoGBANrMTu1gKV2kDxpgjmGe
EfX9ANDfg2hakUKLhwGKXhEivNQLVgdhiDS9pLtZdvKftpOYirGpBD6TsFFlQWxr
x0ThlU7vvv9zMkLlS7l8y1lSAb+kYju5bSh9UGELeC64dIWHxywLqxX4wa2aEFVH
Zpzp9MFjY6Qtsod0FyqybGhz
-----END PRIVATE KEY-----';
$privRes = openssl_pkey_get_private($privPem);
// Generate CSR
$csr = openssl_csr_new(array(
    "organizationName" => "VPNex",
    "commonName" => "test"
), $privRes);

// Generate Cert (self sign)
$cert = openssl_csr_sign($csr, null, $privRes, 3600);
echo openssl_error_string();
// if (! $cert) {
//     $errMsg = openssl_error_string();
//     while ($msg = openssl_error_string()) {
//         $errMsg = "$errMsg\n$msg";
//     }
//     throw new Exception($errMsg);
// }

$x509_data = openssl_x509_parse($cert);
$datetime = new DateTime();
echo $x509_data['name'];
echo "\n";
echo date_create_from_format('ymdHise', $x509_data['validFrom'])->format('c');
echo "\n";
echo date_create_from_format('ymdHise', $x509_data['validTo'])->format('c');
echo "\n";
echo var_dump($x509_data);
