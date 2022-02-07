import RPi.GPIO as GPIO 
import time 
import sys 
import os 
GPIO.setmode(GPIO.BOARD) 
GPIO.setwarnings(False) 
GPIO.setup(3, GPIO.OUT) 
rele_quarto = 3 

def ligar(): 
    GPIO.output(rele_quarto, GPIO.HIGH) 

if __name__ == "__main__": 
    ligar()