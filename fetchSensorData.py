import serial
import requests

# Mengatur koneksi Serial
ser = serial.Serial('COM9', 9600)  # Ganti 'COM3' dengan port yang sesuai

while True:
    if ser.in_waiting > 0:
        emg_value = ser.readline().decode('utf-8').rstrip()
        # Mengirim data ke server PHP
        response = requests.post('http://yourserver.com/emg_receiver.php', data={'emgValue': emg_value})
        print(response.text)
