import 'package:flutter/material.dart';
// ─── DATA MODELS ─────────────────────────────────────────────────────────────

class Project {
  final String name;
  final String description;
  final String iconUrl;
  final Color iconBgColor;

  const Project({
    required this.name,
    required this.description,
    required this.iconUrl,
    required this.iconBgColor,
  });
}

// ─── SAMPLE DATA ─────────────────────────────────────────────────────────────

final List<Project> projects = [
  const Project(
    name: 'Truelancer',
    description:
        'Truelancer Mobile App is a Freelancing Platform. You can Search Jobs & Hire Freelancers for work.',
    iconUrl: '',
    iconBgColor: Color(0xFF29B6F6),
  ),
  const Project(
    name: 'Messio',
    description:
        'An Open-Source Messaging App built using Flutter and Firebase. Part of the series \'60 Days of Flutter\'.',
    iconUrl: '',
    iconBgColor: Color(0xFF42A5F5),
  ),
  const Project(
    name: 'Savaari',
    description:
        'Savaari is the leading player in Outstation Cabs, Hourly Rental Cabs, Airport Pickups and Airport Drop Taxis.',
    iconUrl: '',
    iconBgColor: Color(0xFF26C6DA),
  ),
  const Project(
    name: 'Savaari Partner',
    description:
        'This App allows cab drivers to conveniently share billing and other trip details scheduled to them.',
    iconUrl: '',
    iconBgColor: Color(0xFFFF7043),
  ),
];
