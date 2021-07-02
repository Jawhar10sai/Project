USE [RAMEX]
GO

/****** Object:  Table [dbo].[SOURCE]    Script Date: 28/12/2020 10:59:48 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[SOURCE](
	[source_id] [int] NOT NULL,
	[source_lib] [varchar](50) NULL
) ON [PRIMARY]
GO
