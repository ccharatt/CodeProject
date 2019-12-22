import { BrowserModule } from '@angular/platform-browser';
import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { HttpClientModule } from '@angular/common/http';
import { HomeComponent } from './home/home.component';
import { CourseService } from './course.service';
const routes: Routes = [   
  { path: 'home', component: HomeComponent },  
  { path: 'login', component: LoginComponent },   
  { path: '', redirectTo: '/login', pathMatch: 'full' }
 ]; 
@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HomeComponent,
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(routes),
    FormsModule,
    HttpModule
  ],
  providers: [CourseService],
  bootstrap: [AppComponent]
})
export class AppModule { }
