import { Component, OnInit } from '@angular/core';
import { Route, Router } from '@angular/router';
import { UserInfoService } from '../user-info.service';
import { UserInfo } from '../UserInfo';

@Component({
  selector: 'app-book',
  templateUrl: './book.component.html',
  styleUrls: ['./book.component.css']
})
export class BookComponent implements OnInit {

  private list:UserInfo[];
  private idbook:number;
  private code:string = "";
  private card:string = "";
  private input:string;
  private subinput:string[];
  private subinputcast:number[];
  private i:number;
  private check:boolean;
  private temp:number;

  constructor(private ourService:UserInfoService, private router:Router) { 
    ourService.getUserInfo().subscribe(temp=> {
      if(temp != undefined) {
        this.list = temp;
      } else {
        this.list = [];
      }
    })
  }

  ngOnInit() {
  }
  
  public checkbook(){
      this.check = false;
    if(this.input.split(",").length<=1){
        this.temp = parseInt(this.input)-1;
          if(this.temp < 0 || this.temp >= this.list.length){
            alert("NO")
            return ;
          }
          if(this.list[this.temp].getstatus() == 1){
            this.idbook = Math.random()*1000+1;
 
            this.ourService.addBooking(this.idbook,this.temp+1,this.code,this.card).subscribe(
              result => {
                  if (result){
                    alert ("Complete");
                  
                  }else{
                    alert ("Error");
                  }
                }
             );
             
              this.ourService.updatesit(this.temp+1,1,2).subscribe(
                result => {
                    if (result){
                      alert ("Complete");
                    
                    }else{
                      alert ("Error");
                    }
                  }
               );
              
             alert ("Complete");
          }
        
          else{
            alert("NO")
            return ;
          }
    }
    else{ 
        this.subinputcast = this.input.split(",").map(Number);
        for(this.i=0;this.i<this.subinputcast.length;this.i++){
          this.subinputcast[this.i] = this.subinputcast[this.i]-1;
          if(this.list[this.subinputcast[this.i]].getstatus() == 1){
            this.check = true;
          }
          else{
            this.check = false;
            break;
          }
        }
      
        if(this.check == true){
          this.idbook = Math.random()*1000+1;
          for(this.i=0;this.i<this.subinputcast.length;this.i++){
          this.ourService.addBooking(this.idbook,this.subinputcast[this.i]+1,this.code,this.card).subscribe(
            result => {
                if (result){
                  
                
                }else{
                 
                }
              }
           );
            }
           for(this.i = 0 ;this.i<this.subinputcast.length;this.i++){
           this.ourService.updatesit(this.subinputcast[this.i]+1,1,2).subscribe(
            result => {
                if (result){
                  
                
                }else{
                  
                }
              }
           );
          }
         
           alert ("Complete Booking");
        }
        
        else{
          alert("Can't booking.Please input new again")
        }
      }

    }
   
  }
 
  


