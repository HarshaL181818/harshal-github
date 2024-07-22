
import 'package:first_flutter/views/home_view.dart';
import 'package:flutter/material.dart';

class MyApp extends StatelessWidget{
  const MyApp({
    super.key,
  });
  Widget build(BuildContext context){
    return MaterialApp(
      title: "Flutter",
      theme: ThemeData(
        primarySwatch: Colors.orange,
      ),
      home: HomeView(),
    );
  }
}
