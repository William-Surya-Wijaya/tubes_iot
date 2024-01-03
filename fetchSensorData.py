import serial
import time
import requests

# Inisialisasi koneksi serial dengan Arduino
ser = serial.Serial('COM7', 9600, timeout=1)

def set_arduino_command(command):
    # Kirim perintah ke Arduino (misalnya, 's' untuk start atau 'e' untuk stop)
    ser.write(command.encode())

def read_fetch_flag():
    # Baca isi file fetch_flag.txt
    with open('fetch_flag.txt', 'r') as file:
        return file.read().strip()

def main():
    while True:
        # Baca isi file fetch_flag.txt
        flag_value = read_fetch_flag()
        print(flag_value)

        # Set command Arduino berdasarkan isi file fetch_flag.txt
        if flag_value == 'start':
            set_arduino_command('s')
        elif flag_value == 'stop':
            set_arduino_command('e')


        if(flag_value == 'stop'):
            continue
        # Baca data dari Arduino
        emg_value = ser.readline().decode('utf-8').rstrip()
        emg_time = time.strftime("%Y-%m-%d %H:%M:%S")

        # Kirim data ke database melalui API
        api_url = 'http://localhost/tubes_iot/Dashboard/getDataFromArduino'
        data = {'emgValue': emg_value, 'emgTime': emg_time}
        response = requests.post(api_url, data=data)

        # Tunggu sejenak sebelum membaca ulang
        time.sleep(1)

if __name__ == "__main__":
    main()
