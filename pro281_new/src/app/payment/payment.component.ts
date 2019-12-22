import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css']
})
export class PaymentComponent implements OnInit {
  private cardname:string;
  private cardnumber:string;
  private cvv:string;
  private next:string;

  constructor(private router: Router) { }

  ngOnInit() {
    this.next = '/complete';
  }

  input(){
    // var str = "The best things in life are free";
    var pattname =  /([A-Za-z])*\s([A-Za-z])*$/;
    var resultname = pattname.test(this.cardname);
    var pattnum = /^([0-9]{16})$/;
    var resultnum = pattnum.test(this.cardnumber);
    var pattcvv = /^([0-9]{3})$/;
    var resultcvv = pattcvv.test(this.cvv);
    if(resultname == true && resultnum == true && resultcvv == true){
      this.randcode();
    }else{
      alert("Invalit Input");
    }
  }

  randcode(){
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 8; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    alert("THANK YOU FOR YOUR PAYMENT. YOUR CODE IS "+result);
    
  }

}

