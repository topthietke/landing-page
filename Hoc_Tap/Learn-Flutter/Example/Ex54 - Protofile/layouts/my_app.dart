import 'package:flutter/material.dart';
import 'package:hello_world/components/text.dart';
import 'package:hello_world/layouts/main_screen.dart';



class MyApp extends StatelessWidget {
  const MyApp({super.key});
  MyText get text => MyText();
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: text.appName,
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        brightness: Brightness.dark,
        scaffoldBackgroundColor: const Color(0xFF1A1A1A),
        colorScheme: const ColorScheme.dark(
          primary: Color(0xFF4FC3F7),
          surface: Color(0xFF2A2A2A),
        ),
        fontFamily: 'Roboto',
      ),
      home: const MainScreen(),
    );
  }
}