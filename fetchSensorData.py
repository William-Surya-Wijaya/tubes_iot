import serial
import requests

# Mengatur koneksi Serial
ser = serial.Serial('COM9', 9600) # Ganti 'COM3' dengan port yang sesuai

while True:
    if ser.in_waiting > 0: # Harus ubah lagi buat ambil time stamp
        emg_value = ser.readline().decode('utf-8').rstrip()
        # Mengirim data ke server PHP
        response = requests.post('http://localhost/insert-sensor-data', data={'emgValue': emg_value, 'emgTime': emg_time})
        print(response.text)

# william ---
# Tambahin trigger kirim
# database

#tunjukan efektif atau tidak
#tambah data gerakan