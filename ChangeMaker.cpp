#include <iostream>
#include <array>
#include <string>
#include <cstring>

void clear_console(){
    if (system("CLS")) system("clear");
}

float saisir_valeur(){
    float amount;
    std::cout<<"Saisissez une valeur :"<<std::endl;
    std::cin>>amount;
    if(std::cin.fail() || amount < 0){
        clear_console();
        std::cout << "Erreur, veuillez saisir une valeur supérieur a 0" << std::endl;
        std::cin.clear();
        std::cin.ignore(256,'\n');
        amount = saisir_valeur();
    }
    return amount;
}

int main(){
    std::array<float, 12> money = {50,20,10,5,2,1,0.5,0.2,0.1,0.05,0.02,0.01};
    float amount,value;
    std::string text;
    
    amount = saisir_valeur();
    value = amount;
    
    std::array<int, 12> banknotes_coins;
    
    if (amount >= 0){
        for (int i=0;i<money.size();i++){
            banknotes_coins[i] = 0;
            while (amount >= money[i]){
                banknotes_coins[i] = banknotes_coins[i] +1;
                amount = amount - money[i];
            }
        }
    }
    clear_console();
    std::cout<<"Pour diviser "<<value<<"€ en un minimum de billets/pièces vous aurez besoin :"<<std::endl;
    for(int i=0; i<money.size();i++){
        if(banknotes_coins[i] > 0){
            if(money[i] >= 5){
                if(banknotes_coins[i] > 1){
                    text = "de "+std::to_string(banknotes_coins[i])+" billets de "+std::to_string(money[i])+"€";
                } else {
                    text = "d'un billet de "+std::to_string(money[i])+"€";
                }
            } else {
                if(banknotes_coins[i] > 1){
                    text = "de "+std::to_string(banknotes_coins[i])+" pièces de "+std::to_string(money[i])+"€";
                } else {
                    text = "d'un pièce de "+std::to_string(money[i])+"€";
                }
            }
            std::cout<<" - "<<text<<std::endl;
        }
    }
}