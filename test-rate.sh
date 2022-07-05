#!/bin/bash
NUM=40
INTERVAL=0.05
URL="https://pe.testes.map.as/teste.php"

COUNTER=0
for i in "$@"; do
    COUNTER=$(($COUNTER+1))
    case $i in
        -n)
            J=$(($COUNTER+1))
            NUM="${!J}"
        ;;
        -i)
            J=$(($COUNTER+1))
            INTERVAL="${!J}"
        ;;
        -u)
            J=$(($COUNTER+1))
            URL="${!J}"
        ;;
    esac
done

echo "

test-rate.sh [-n $NUM] [-i $INTERVAL] [-u $URL]

-n  número de requisições para fazer
-i  intervalo entre as requisições
        
Testando $NUM requisições com intervalo de $INTERVAL segundos entre elas.
-----------------
"

COMANDO="curl -o /dev/null -s --fail $URL"
rm /tmp/test_rate_success
rm /tmp/test_rate_fail
touch /tmp/test_rate_success
touch /tmp/test_rate_fail
for counter in $(seq 1 $NUM); do
    $($COMANDO && 
        (echo "echo 'requisição $counter SUCEDIDA'" && 
        printf %s "1" >> /tmp/test_rate_success) || 
        
        (echo "echo 'requisição $counter FALHOU'" &&
        printf %s "1" >> /tmp/test_rate_fail);
        
        echo ":  BEM SUCEDIDAS $(stat --printf="%s" /tmp/test_rate_success)  : 
              MAL SUCEDIDAS $(stat --printf="%s" /tmp/test_rate_fail)" ;


    ) &
    sleep $INTERVAL
done
