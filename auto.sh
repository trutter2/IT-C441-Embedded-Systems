#!/bin/bash

while true
do
    gpio -g write 17 1
    sleep 5s
    gpio -g write 17 0
    gpio -g write 22 1
    sleep 3s
    gpio -g write 22 0
    gpio -g write 27 1
    sleep 5s
    gpio -g write 27 0
done    