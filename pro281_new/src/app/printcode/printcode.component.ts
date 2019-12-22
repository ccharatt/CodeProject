import { Component, OnInit } from '@angular/core';
import { Route, Router } from '@angular/router';
import { U1serInfoService } from '../u1ser-info.service';
import { U1serInfo } from '../U1serInfo';


@Component({
  selector: 'app-printcode',
  templateUrl: './printcode.component.html',
  styleUrls: ['./printcode.component.css']
})
export class PrintcodeComponent implements OnInit {
  private list:U1serInfo[];
  private a:number

  constructor(private ourService:U1serInfoService, private router:Router) { 
    ourService.getU1serInfo().subscribe(temp=> {
      if(temp != undefined) {
        this.list = temp;
      } else {
        this.list = [];
      }
    })
  }

  ngOnInit() {
  }
  public test(){
    this.a = this.list[2].getidbook();
    alert(this.a)
  }
}
