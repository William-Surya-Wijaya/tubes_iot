# Jangan lupa install library dulu

import serial
import requests
import time

def read_flag():
    try:
        with open('fetch_flag.txt', 'r') as file:
            return file.read().strip()
    except FileNotFoundError:
        return 'stop'

def start_measurement():
    ser.write(b's')  # Mengirim perintah 'start' ke Arduino

def stop_measurement():
    ser.write(b'e')

# Mengatur koneksi Serial
ser = serial.Serial('COM9', 9600)

while True:
    flag = read_flag()

    if flag == 'start':
        start_measurement()
        time.sleep(10)

        while True:
            if ser.in_waiting > 0:
                emg_value = ser.readline().decode('utf-8').rstrip()
                emg_time = time.strftime("%Y-%m-%d %H:%M:%S")
                response = requests.post('http://localhost/insert-sensor-data', data={'emgValue': emg_value, 'emgTime': emg_time})
                print(response.text)
            else :
                stop_measurement()
    elif flag == 'stop':
        # Opsional: Tindakan ketika diinstruksikan untuk berhenti
        pass

    time.sleep(1)

#tunjukan efektif atau tidak
#tambah data gerakan