import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import {UserInfoService} from './user-info.service';
import {U1serInfoService} from './u1ser-info.service';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { BookComponent } from './book/book.component';
import { PaymentComponent } from './payment/payment.component';
import { PrintcodeComponent } from './printcode/printcode.component';
import { CheckcodeComponent } from './checkcode/checkcode.component';


const routes: Routes = [   
  { path: 'home', component: HomeComponent },
  { path: 'book', component: BookComponent },
  { path: 'payment', component: PaymentComponent },
  { path: 'printcode', component: PrintcodeComponent }, 
  { path: 'checkcode', component: CheckcodeComponent }, 
  { path: '', redirectTo: '/home', pathMatch: 'full' }
]; 

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    BookComponent,
    PaymentComponent,
    PrintcodeComponent,
    CheckcodeComponent
   
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(routes),
    FormsModule,
    HttpModule
  ],
  providers: [UserInfoService],
  bootstrap: [AppComponent]
})
export class AppModule { }
